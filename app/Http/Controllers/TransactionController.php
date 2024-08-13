<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\Verify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PayOS\PayOS;
use Exception;
use App\Http\Controllers\AdminTransactionController;

class TransactionController extends Controller
{

    protected $adminTransactionController;

    public function __construct(AdminTransactionController $adminTransactionController)
    {
        $this->adminTransactionController = $adminTransactionController;
    }

    // Trang Bảo hiểm
    public function insurance()
    {
        return view('frontend.insurance');
    }
    // Trang Bán tiền mã hóa
    public function sell()
    {
        // $prices = $this->prices();
        $verified       = session()->get('verifyItem');
        $is_verified    = $verified && $verified->status ? 1 : 0;
        $fee            = $is_verified ? 0 : 0.03;
        $params = [
            // 'prices'    => $prices,
            'fee'           => $fee,
            'verified'      => $verified,
            'is_verified'    => $is_verified,
        ];
        return view('frontend.sell',$params);
    }
    // Trang Mua tiền mã hóa
    public function buy()
    {
        $verified       = session()->get('verifyItem');
        $is_verified    = $verified && $verified->status ? 1 : 0;
        $fee            = $is_verified ? 0 : 0.03;
        $uuid = substr(Str::uuid()->toString(), 0, 8);

        $cryptoNetworks = array(
            'BTC' => array(
                array(
                    'value' => 'BSC',
                    'name' => 'BSC-BNB Smart Chain (BEP20)',
                    'processingTime' => '3 phút',
                    'transactionFee' => '0.000009'
                ),
            ),
            'USDT' => array(
                array(
                    'value' => 'TRX',
                    'name' => 'TRX-Tron (TRC20)',
                    'processingTime' => '2 phút',
                    'transactionFee' => '1'
                ),
                array(
                    'value' => 'BSC',
                    'name' => 'BSC-BNB Smart Chain (BEP20)',
                    'processingTime' => '3 phút',
                    'transactionFee' => '0.33'
                ),
            ),
            'BNB' => array(
                array(
                    'value' => 'BSC',
                    'name' => 'BSC-BNB Smart Chain (BEP20)',
                    'processingTime' => '2 phút',
                    'transactionFee' => '0.00012'
                )
            )
        );
        $params = [
            'uuid'              => $uuid,
            'fee'               => $fee,
            'verified'          => $verified,
            'is_verified'       => $is_verified,
            'cryptoNetworks'    => $cryptoNetworks,
        ];
        return view('frontend.buy',$params);
    }
    
    public function transaction()
    {
        session()->forget('transfer_sell');
        return redirect()->route('buy');
        
        $uuid = substr(Str::uuid()->toString(), 0, 8);
        return view('frontend.buy-sell', compact('uuid'));
    }
    public function transfer()
    {
        return view('frontend.transfer');
    }
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
        $orderId = $param['orderId'];
        $ss_key = 'getVietQrCode_'.$orderId;
        $result = session()->get($ss_key,[]);

        if( isset($result['qrCode']) ){
            return $result;
        }
        
        $url      = "https://api.vietqr.org/vqr/api/qr/generate-customer";
        $token    = $this->getVietQrToken()['access_token'];
        $response = Http::withToken($token)->withBody(json_encode($param), 'application/json')->post($url);
        $result   = $response->json();
        session()->put($ss_key, $result);
        return $result;
    }

    public function getQrCode($data)
    {
        $content = $data['uuid'];
        $param   = [
            "bankAccount"  => "30123488888",
            "bankCode"     => "MB",
            "amount"       => "50000",//Nhớ để lại 50000
            "content"      => $data['uuid'],
            "transType"    => "C",
            "orderId"      => $data['uuid'],
            "userBankName" => $data['account_name'],
        ];
        
		$response = $this->getVietQrCode($param);
		$qrCode   = $response['qrCode'];
		$qrCode   = "data:image/png;base64, " . base64_encode(QrCode::format('png')->size(300)->generate($qrCode));
        $content = $response['content'];
        return ['qrCode' => $qrCode, 'content' => $content];
    }
    public function handleVerify(Request $request, $uuid, $status = '')
    {
        $verify = $data = Verify::whereUuid($uuid)->first();
        if (!$data) {
            abort(404);
        }
        $bankData           = [...$data->toArray()];
        $bankData['qrCode'] = $this->getQrCode($data);
        if ($data->status == 1) {
            $verified = true;
            return view('frontend.handle-verify', compact('bankData','verified'));
        }
        if ($data->status == 0 || $data->status == 2) {
            $pending = true;
            return view('frontend.handle-verify', compact('bankData','pending'));
        }
        return view('frontend.handle-verify', compact('bankData'));
    }
    public function verifyCccd()
    {
        return view('frontend.verify-cccd');
    }

    public function signature($query_string, $secret)
    {
        return hash_hmac('sha256', $query_string, $secret);
    }
    /*
    public function sendCoin($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        $recvWindow = 5000;
        $parameters = [
            'coin' => $transaction->state,
            'network' => $transaction->network,
            'address' => $transaction->address_wallet,
            'amount' => $transaction->crypto_amount,
            'recvWindow' => $recvWindow,
        ];

        $secret = env('BINANCE_API_SECRET');
        $url    = "https://api.binance.com/sapi/v1/capital/withdraw/apply";
        $header = [
            'X-MBX-APIKEY' => env('BINANCE_API_KEY'),
        ];
        $parameters['timestamp'] = round(microtime(true) * 1000);
        $query                   = Arr::query($parameters);
        $parameters['signature'] = $this->signature($query, $secret);
        try {
            $response = Http::withHeaders($header)->withQueryParameters($parameters)->post($url);
            dd($response);
            return $response->json();
        } catch (\Exception $e) {
            dd( $e->getMessage() );
        }
    }
    */

    function sendMessageToTelegram($payload)
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $apiUrl = "https://api.telegram.org/bot" . $botToken . "/sendMessage";
        $response = Http::accept('application/json')->withBody(json_encode($payload))->post($apiUrl);
        return $response->json();
    }
    public function transactionSync(Request $request)
    {
        $request->validate([
            'transactionid'   => 'required',
            'transactiontime' => 'required',
            'referencenumber' => 'required',
            'amount'          => 'required',
            'content'         => 'required',
            'bankaccount'     => 'required',
            'transType'       => 'required',
            'orderId'         => 'required',
        ]);
        $uuid = $request->orderId;
        \Log::info($request->all());
        if (str_contains($request->content, 'BUY')) {
            $transaction = Transaction::whereUuid($uuid)->first();
            if ($transaction) {
                // || true để test
                if ($transaction->amount <= (int) $request->amount) {
                    $transaction->update([
                        'bank_amount' =>  (int) $request->amount,
                        'status' => Transaction::STATUS_VALID
                    ]);
                    // Tiến hành gửi coin cho khách
                    $this->adminTransactionController->doSendCoin($transaction->id);

                    $transaction->status = Transaction::STATUS_VALID;
					$verifyItem = Verify::whereUuid($transaction->user_uuid)->first();
					$status = $transaction->status == 0 ? "Chờ xét duyệt" :($transaction->status == 1 ? 'Đã hoàn thành' : 'Số tài khoản chuyển khoản không hợp lệ');
$text = "
<b>🆕Mua coin</b>\n
<b>✅Trạng thái: $status</b>\n
<b>✅Tên tài khoản: ".@$verifyItem->account_name."</b>\n
<b>✅Số tài khoản: ".@$verifyItem->account_number."</b>\n
<b>✅Ngân hàng: ".@$verifyItem->bank_name."</b>\n
<b>✅Coin: $transaction->state</b>\n
<b>✅Mạng lưới: $transaction->network</b>\n
<b>✅Địa chỉ ví: $transaction->address_wallet</b>\n
<b>✅Tiền cần chuyển khoản: $transaction->crypto_amount</b>\n
<b>✅Số tiền chuyển khoản: $transaction->bank_amount</b>\n
";

                    // gửi telegram
                    $channelChatId = env('TELEGRAM_CHANEL_BUY_ID');
                    $payload = [
                        "chat_id" =>$channelChatId,
                        "text"=> $text,
                        "parse_mode"=> 'html'
                    ];
                    $this->sendMessageToTelegram($payload);
                }
            }
        } else {
            $uuid = $request->orderId;
            $verifyItem = Verify::whereUuid($uuid)->first();
            $item       = [
                "amount"         => (int) $request->amount,
                "transaction_id" => $request->transactionid,
                "status"         => 2,
                "type" => Verify::VERIFY_BANK
            ];
            $verifyItem->update($item);
            // gửi telegram
$text = "
<b>🆕Khách hàng xác minh mới</b>\n
<b>✅Loại xác minh: Ngân hàng</b>\n
<b>✅Tên tài khoản: $verifyItem->account_name</b>\n
<b>✅Số tài khoản: $verifyItem->account_number</b>\n
<b>✅Ngân hàng: $verifyItem->bank_name</b>\n
<b>✅Số tiền chuyển khoản: $verifyItem->amount</b>\n
";
            $channelChatId = env('TELEGRAM_CHANEL_VERIFY_ID');
            $payload = [
                "chat_id" =>$channelChatId,
                "text"=> $text,
                "parse_mode"=> 'html'
            ];
            $this->sendMessageToTelegram($payload);
        }

        return response()->json(
            [
                'error'        => false,
                "errorReason"  => "000",
                'toastMessage' => 'Success',
                "object"       => [
                    "reftransactionid" => $uuid,
                ],
            ]
        );
    }

    public function checkSendOtp(Request $request)
    {
        $uuid       = $request->uuid;
        $task       = $request->task;
        $verifyItem = Verify::whereUuid($uuid)->first();
        if (!$verifyItem) {
            return response()->json(['success' => false]);
        }
        $verified = false;
        if ($verifyItem->status == 1) {
            $sent    = false;
            $verified = true;
            $message  = 'Đã xác minh';
            session()->put('verifyItem',  $verifyItem);
            $verifyTransactions = Transaction::where('user_uuid', $verifyItem->id)->valid()->get();
            session()->put('verifyTransactions'.$verifyItem->id, $verifyTransactions);
        }elseif ($verifyItem->message_type == 3) {
            $sent    = true;
            $message  = 'Gửi mã CODE';
            session()->put('verifyItem',  $verifyItem);
            $verifyTransactions = Transaction::where('user_uuid', $verifyItem->id)->valid()->get();
            session()->put('verifyTransactions'.$verifyItem->id, $verifyTransactions);
        } 
        elseif ($verifyItem->amount >= 50000) {
            $sent    = false;
            $message = 'Hệ thống đang chuyển tiền cho bạn';
        }elseif ($verifyItem->amount < 50000 && $verifyItem->amount > 0) {
            $sent    = false;
            $message = 'Số tiền bản chuyển khoản không hợp lệ';
        }elseif ($verifyItem->status == 2) {
            $sent    = false;
            $message = 'Chuyển khoản thành công. <br>Đang xác minh thanh toán';
        } else {
            $sent    = false;
            $message = 'Vui lòng chuyển khoản';
        }
        if($verifyItem->message_type == Verify::MESSAGE_TYPE_INVALID){
            $sent    = false;
            $message = 'Tài khoản chuyển khoản không khớp';
        }
        return response()->json(['success' => true, 'sent' => $sent, 'verified' => $verified, 'message' => $message, 'message_type' => $verifyItem->message_type]);
    }

    public function checkBanking(Request $request)
    {
        $uuid           = $request->uuid;
        $transaction    = Transaction::whereUuid($uuid)->first();
        $task           = $request->task;
        if( $task == 'da_chuyen_tien' ){

            $verifyItem = Verify::where('id',$transaction->user_uuid)->first();
            $text = "<b>🆕Đơn hàng mới</b>\n
<b>✅Mã lệnh: $transaction->uuid </b>\n
<b>✅Số coin mua: $transaction->crypto_amount $transaction->state </b>\n
<b>✅Số tiền thanh toán: $transaction->amount VND </b>\n
<b>✅Địa chỉ: $transaction->address_wallet </b>\n
<b>✅Mạng lưới: $transaction->network </b>\n
<b>✅Tên tài khoản: $verifyItem->account_name</b>\n
<b>✅Số tài khoản: $verifyItem->account_number</b>\n
<b>✅Ngân hàng: $verifyItem->bank_name</b>\n
";

                        $channelChatId = env('TELEGRAM_CHANEL_BUY_ID');
                        $payload = [
                            "chat_id" =>$channelChatId,
                            "text"=> $text,
                            "parse_mode"=> 'html'
                        ];
                        $this->sendMessageToTelegram($payload);
            $transaction->status = 2;
            $transaction->save();
            return response()->json(['success' => true, 'reload' => true]);
        }

        if (!$transaction) {
            $message = 'Đơn hàng không tồn tại';
            return response()->json(['success' => false, 'message' => $message]);
        }
        $status = $transaction->status;
        if ($transaction->status == Transaction::STATUS_VALID) {
            $sent    = true;
            $message = 'Đơn hàng đã hoàn thành';
        } elseif ($transaction->status == Transaction::STATUS_INVALID) {
            $sent    = true;
            $message = 'Số tài khoản chuyển khoản không khớp';
        } elseif ($transaction->status == Transaction::STATUS_PAID) {
            $sent    = true;
            $message = 'Đang xác minh thanh toán';
        } elseif ($transaction->status == 5) {
            $sent    = true;
            $message = 'Chuyển coin thất bại. Đang xử lý';
        }
         elseif ($transaction->bank_amount) {
            $sent    = true;
            $message = 'Đã thanh toán';
        } elseif (Carbon::now()->greaterThan($transaction->expired_in)) {
            $sent    = true;
            $message = 'Đơn hàng đã hết hạn';
        } else {
            $sent    = false;
            $message = 'Chờ bạn thanh toán';
        }
        return response()->json(['success' => true, 'sent' => $sent, 'status' => $status, 'message' => $message]);
    }

    public function verifyOtp(Request $request)
    {
        $otp        = $request->otp;
        $uuid       = $request->uuid;
        $verifyItem = Verify::whereUuid($uuid)->whereVerifyNumber($otp)->first();
        if ($verifyItem) {
            session()->put('verifyItem',  $verifyItem);
            $verifyItem->update([
                'status' => 1,
                'message_type' => 1
            ]);
            return response()->json(['success' => true, 'message' => 'Xác minh thành công']);
        }
        return response()->json(['success' => false, 'message' => 'Mã OTP không hợp lệ']);
    }

    public function histories(){
        
    }

}