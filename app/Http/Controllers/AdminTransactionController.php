<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use App\Models\Verify;

class AdminTransactionController extends Controller
{
    public function signature($query_string, $secret)
    {
        return hash_hmac('sha256', $query_string, $secret);
    }
    public function checkWallet()
    {
		$parameters = [
			'type' => 'SPOT'
		];
        $secret = env('BINANCE_API_SECRET');
        $url    = "https://api.binance.com/sapi/v1/accountSnapshot";
        $header = [
            'X-MBX-APIKEY' => env('BINANCE_API_KEY'),
        ];
        $parameters['timestamp'] = round(microtime(true) * 1000);
        $query                   = Arr::query($parameters);
        $parameters['signature'] = $this->signature($query, $secret);
        $response                = Http::withHeaders($header)->withQueryParameters($parameters)->get($url);
		\Log::info('response: '.$response);
        return $response->json();
    }
	public function sendCoin($parameters)
    {
        $secret = env('BINANCE_API_SECRET');
        $url    = "https://api.binance.com/sapi/v1/capital/withdraw/apply";
        $header = [
            'X-MBX-APIKEY' => env('BINANCE_API_KEY'),
        ];
        $parameters['timestamp'] = round(microtime(true) * 1000);
        $query                   = Arr::query($parameters);
        $parameters['signature'] = $this->signature($query, $secret);
        $response                = Http::withHeaders($header)->withQueryParameters($parameters)->post($url);
        return $response->json();
    }
    function sendMessageToTelegram($payload)
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $apiUrl = "https://api.telegram.org/bot" . $botToken . "/sendMessage";
        $response = Http::accept('application/json')->withBody(json_encode($payload))->post($apiUrl);
        return $response->json();
    }
    public function index(){
        $transactions = Transaction::with('verify')->latest()->paginate(25);
        return view('admin.transaction.index', compact('transactions'));
    }
    public function show($id)
    {
        $transaction = Transaction::find($id);
        // dd($transaction);
        return view('admin.transaction.show', compact('transaction'));
    }
    public function updateStatus(Request $request,$id){
        $transaction = Transaction::find($id);
        $transaction->update(['status' => $request->status]);
        $verifyTransactions = Transaction::where('user_uuid', $transaction->user_uuid)->valid()->get();

        $verifyItem = Verify::where('id',$transaction->user_uuid)->first();
        session()->put('verifyTransactions'.$verifyItem->id, $verifyTransactions);
        return response()->json(array('success' => true, 'message' => 'Thay đổi trạng thái thành công'));
    }
    public function invalid(Request $request,$id){
        $transaction = Transaction::find($id);
        $status = $request->boolean('invalid') ? Transaction::STATUS_INVALID : Transaction::STATUS_PENDING;
        $transaction->update(['status' => $status]);
        return response()->json(array('success' => true, 'message' =>  $status ? 'Đã chuyển thành: Số tài khoản ck không hợp lệ' :'Đã chuyển thành: Đang chờ xử lý' ));
    }
    
    public function acceptSendCoin(Request $request, $id){
        if($request->accept){
            return $this->doSendCoin($id);
        }
    }
    public function doSendCoin($id){
        $transaction = Transaction::find($id);
        // $wallet_account = $this->checkWallet();
        // \Log::info($wallet_account);
        $cryptoNetworks = array(
            'BTC' => array(
                'BSC' => array(
                    'value' => 'BSC',
                    'name' => 'BSC-BNB Smart Chain (BEP20)',
                    'processingTime' => '3 phút',
                    'transactionFee' => '0.000009'
                ),
            ),
            'USDT' => array(
                'TRX' => array(
                    'value' => 'TRX',
                    'name' => 'TRX-Tron (TRC20)',
                    'processingTime' => '2 phút',
                    'transactionFee' => '1'
                ),
                'BSC' => array(
                    'value' => 'BSC',
                    'name' => 'BSC-BNB Smart Chain (BEP20)',
                    'processingTime' => '3 phút',
                    'transactionFee' => '0.33'
                ),
            ),
            'BNB' => array(
                'BSC' => array(
                    'value' => 'BSC',
                    'name' => 'BSC-BNB Smart Chain (BEP20)',
                    'processingTime' => '2 phút',
                    'transactionFee' => '0.00012'
                )
            )
        );
        $transactionFee = @$cryptoNetworks[$transaction->state][$transaction->network]['transactionFee'];
        $transactionFee = $transactionFee ? $transactionFee : 0;
        $recvWindow = 5000;
        $param = [
            'coin' => $transaction->state,
            'network' => $transaction->network,
            'address' => $transaction->address_wallet,
            'amount' => $transaction->crypto_amount + $transactionFee,
        ];
        $response = $this->sendCoin($param);
        if(isset($response['id'])) {
            $transaction->update(['status' => 1]);
            $verifyItem = Verify::find($transaction->user_uuid)->first();
            $status = $transaction->status == 0 ? "Chờ xét duyệt" : ($transaction->status == 1 ? 'Đã hoàn thành' : 'Số tài khoản chuyển khoản không hợp lệ');
            // hoàn thành đơn hàng
            return response()->json(['success' =>true, 'message' => 'Chuyển coin thành công.']);
        }else{
            //Chuyển coin thất bại
            $transaction->status = 5;
            $transaction->save();
            return response()->json(['success' =>false, 'message' => $response['msg']]);
        }
    }
}