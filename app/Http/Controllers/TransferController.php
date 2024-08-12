<?php

namespace App\Http\Controllers;

use App\Http\Requests\KycCccdRequest;
use App\Http\Requests\TransferRequest;
use App\Http\Requests\TransferSellRequest;
use App\Models\IdImage;
use App\Models\Transaction;
use App\Models\Verify;
use App\Models\Coin;
use App\Models\Order;
use App\Traits\UploadFileTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Session;
use PayOS\PayOS;
class TransferController extends Controller
{
    use UploadFileTrait;
    

   
    public function getVietQrToken()
    {
        $url      = "https://api.vietqr.org/vqr/api/token_generate";
        $username = env('VIETQR_USERNAME');
        $password = env('VIETQR_PASSWORD');
        $response = Http::withBasicAuth($username, $password)->post($url);
        $result   = $response->json();
        return $result;
    }
    public function getVietQrCode($param)
    {
        $url      = "https://api.vietqr.org/vqr/api/qr/generate-customer";
        $token    = $this->getVietQrToken()['access_token'];
        $response = Http::withToken($token)->withBody(json_encode($param), 'application/json')->post($url);
        $result   = $response->json();
        return $result;
    }

    public function getQrCode($data)
    {
        $content = $data['content'];
        $param   = [
            "bankAccount"  => $data['bank_account'],
            "bankCode"     => $data['bank_code'],
            "amount"       => $data['amount_buy'],
            "content"      => $content,
            "transType"    => "C",
            "orderId"      => $data['uuid'],
            "userBankName" => $data['account_name'],
        ];
        
		$response = $this->getVietQrCode($param);
        $content = $response['content'];
		$qrCode   = $response['qrCode'];
		$qrCode   = "data:image/png;base64, " . base64_encode(QrCode::format('png')->size(300)->generate($qrCode));
        
        
        return [...$response, 'qrCode' => $qrCode, 'content' => $content];
    }
    public function getCoinAmount($bank_amount, $coin){
        $response = $this->prices();
        $priceDifference = 0;

        $usdt = $response['USDT'];
        $btc = $response['BTC'];
        $bnb = $response['BNB'];

        $usdtSellPrice = $usdt["USDT-VND"]["bid"];
        $usdtBuyPrice = $usdt["USDT-VND"]["ask"];

        $usdtTransferBuy = $usdtBuyPrice + $priceDifference;
        $usdtTransferSell = $usdtBuyPrice - $priceDifference;

        $btcSellPrice = $btc * $usdtTransferSell;
        $btcBuyPrice = $btc * $usdtTransferBuy;

        $bnbSellPrice = $bnb * $usdtTransferSell;
        $bnbBuyPrice = $bnb * $usdtTransferBuy;
        if($coin == 'BTC'){
            $price = $bank_amount * $btcSellPrice;
        }elseif($coin == 'BNB'){
            $price = $bank_amount * $bnbSellPrice;
        }else{
            $price = $bank_amount * $usdtSellPrice;
        }
        return $price;
    }
    public function buy(TransferRequest $request, $uuid)
    {
        //Số tiền cần thanh toán
        $crypto_amount_r = $request->amount_buy;
        //Mua
        $amount_buy_r = $request->crypto_amount;

        $crypto_amount_r = str_replace(',','',$crypto_amount_r);
        $amount_buy_r = str_replace(',','',$amount_buy_r);
        
        $verifyItem = Verify::whereUuid($request->user_uuid)->first();

        $data = [
            ...$request->all(),
            'uuid'         => $uuid,
            'content'      => 'BUY',
            'account_name' => 'PHAM TRONG NAM',
            'bank_account' => '30123488888',
            'bank_code'    => 'MB',
            'amount_buy'   => $crypto_amount_r,
            'crypto_amount' => $amount_buy_r
        ];
        $transaction = Transaction::whereUuid($uuid)->first();
        if ($transaction) {
            $data = [...$data, ...$transaction->toArray()];
        } else {
            $expired_in  = Carbon::now()->addMinutes(15);
            $response    = $this->getQrCode($data);
            $data        = [...$data, ...$response];
            $transaction = Transaction::create([
                'uuid'           => $uuid,
                'amount_buy'         => $crypto_amount_r,
                'amount'         => $crypto_amount_r,
                'crypto_amount'  => $amount_buy_r,
                'state'          => $data['state'],
                'network'        => $data['network_select'],
                'address_wallet' => $data['address_wallet'],
                'expired_in'     => $expired_in,
                'qrCode'         => $data['qrCode'],
                'user_uuid'     =>  $verifyItem?->id
            ]);
            $transaction =  Transaction::whereUuid($uuid)->first();
            $data = [...$data, ...$transaction->toArray()];
        }
        session()->put($uuid,$data);
        return redirect()->route('transfer.handle-buy', $uuid);
        return view('frontend.transfer', ['data' => $data]);
    }
    public function handleBuy(Request $request, $uuid, $status = '')
    {
        $transaction = Transaction::whereUuid($uuid)->first();
        $verifyItem = Verify::where('id',$transaction->user_uuid)->first();
        $data = session()->get($uuid);
        $data['status'] = $transaction->status;
        $paymentLink = '';
        return view('frontend.transfer', ['data' => $data,'paymentLink' => $paymentLink]);
    }

    public function getRandomHistoryData()
    {
        $historyData = DB::table('history_auto')->inRandomOrder()->limit(5)->get();
        $historyDataArr = $historyData->toArray();
        usort($historyDataArr, function($a, $b) {
            return $a->time - $b->time;
        });
        return response()->json($historyDataArr);
    }

    public function Viewsell($uuid = null)
    {
        $order = Order::where('uuid',$uuid)->first();
        if(!$order){
            $param = session('transfer_sell', []);
        }else{
            $param = session('transfer_sell', []);
            $param['order_status'] = $order->status;
            $param['order_id'] = $order->id;
            $param['order_created'] = $order->created_at;
            $param = array_merge($param,$order->toArray());
        }
        return view('frontend.transfer-sell',$param);
    }
    function sendMessageToTelegram($payload)
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $apiUrl = "https://api.telegram.org/bot" . $botToken . "/sendMessage";
        $response = Http::accept('application/json')->withBody(json_encode($payload))->post($apiUrl);
        return $response->json();
    }
    public function sell(TransferSellRequest $request)
    {
        $info_coin = Coin::where('coin_name',$request->state_sell)->first();
        $verify = Verify::where('account_number',$request->bank_number)->first();
        // Số tiền nhận được
        $amountSell       = $request->amount_sell;
        $amountSell = str_replace(',','',$amountSell);
        // Số coin muốn bán
        $cryptoAmountSell = $request->crypto_amount_sell;
        $cryptoAmountSell = str_replace(',','',$cryptoAmountSell);

        // Đơn vị tiền tệ
        $stateSell        = $request->state_sell;
        $priceSell        = $request->estimated_price_input_sell;

        //  echo '<pre>'; print_r($request->all()); die(); 

        $uuid = substr( md5(time())  , 0 , 8);
        $expired_in = Carbon::now()->addMinutes(15);
        $param = [
            'amountSell'       => $amountSell,
            'cryptoAmountSell' => $cryptoAmountSell,
            'stateSell'        => $stateSell,
            'priceSell'        => $priceSell,
            'verify_id'        => $verify->id,
            'info_coin'         => $info_coin,
            'uuid'              => $uuid,
            'expired_in'        => $expired_in,
            'order_created'     => Carbon::now(),
            'order_status'      => 0,
            'order_id'          => rand(888,999),
        ];
        session(['transfer_sell' => $param]);
        
        return redirect()->route('transfer.sell',$uuid);
        // return view('frontend.transfer-sell', $param);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function kycCccd(KycCccdRequest $request)
    {
        try {
            DB::beginTransaction();

            // Check if the customer exists
            $accountNumber = $request->account_number;

            $verify = Verify::where('account_number', $accountNumber)->first();
            // Create a new IdImage instance with updateOrCreate
            $idImage = IdImage::updateOrCreate(
                ['verify_id' => $verify->id], // Update if verify_id exists, or create if it doesn't
                [
                    'id_front' => $request->hasFile('id_front') ? $this->uploadFile($request->file('id_front'), 'uploads') : null,
                    'id_back' => $request->hasFile('id_back') ? $this->uploadFile($request->file('id_back'), 'uploads') : null,
                    'id_user' => $request->hasFile('id_user') ? $this->uploadFile($request->file('id_user'), 'uploads') : null,
                ]
            );

            // gửi telegram
$text = "
<b>🆕Khách hàng xác minh mới</b>\n
<b>✅Loại xác minh: CCCD</b>\n
<b>✅Tên tài khoản: $verify->account_name</b>\n
<b>✅Số tài khoản: $verify->account_number</b>\n
<b>✅Ngân hàng: $verify->bank_name</b>\n
";
            $channelChatId = env('TELEGRAM_CHANEL_VERIFY_ID');
            $payload = [
            "chat_id" =>$channelChatId,
            "text"=> $text,
            "parse_mode"=> 'html'
            ];
            $this->sendMessageToTelegram($payload);
            DB::commit();
            Session::flash('success', 'Đã Tải Lên Ảnh Thành Công!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Đã có lỗi xảy ra.');
        }
    }
}