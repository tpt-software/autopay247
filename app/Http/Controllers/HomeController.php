<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use App\Models\Verify;
use App\Models\InfoVerify;
use App\Models\Transaction;
use DB;
use Illuminate\Support\Facades\Cache;
class HomeController extends Controller
{
    public function banks()
    {
        return view('frontend.verify');
    }
    public function index()
    {
        return view('frontend.index');
    }

    public function verify(Request $request)
    {
        $uuid = $request->uuid;
        $bankName = $request->bankName;
        $bankNumber = $request->bankNumber;
        $accountNumber = $request->accountNumber;
        $content = 'Xac minh tai khoan';
        $param = [
            "bankAccount" => "8862460273",
            "bankCode" => "BIDV",
            "amount" => "50000",
            "content" => $content,
            "transType" => "C",
            "orderId" =>  $uuid,
            "userBankName" => 'PHAM TRONG NAM'
        ];
        $response = $this->getVietQrCode($param);
        $qrCode = $response->json()['qrCode'];
        $result = $response->json();
        return response()->json($result);
    }

    public function prices()
    {
        $response = Cache::get('prices',null);
        if($response){
            return response()->json($response);
        }else{
            $priceUsdt = $this->getPrice();
            $priceBnb = $this->getPriceBinance();
            $bank = Verify::all();
            $response = [
                'USDT' => $priceUsdt,
                'BNB' => $priceBnb['BNBUSDT'],
                'BTC' => $priceBnb['BTCUSDT'],
                'bank' => $bank
            ];
            Cache::put('prices', $response, 5);
        }
        return response()->json($response);
    }

    public function getPrice()
    {
        $response = Http::get('https://aliniex.com/api/ticker');
        $result = $response->json();
        return $result;
    }

    public function getPriceBinance()
    {
        $symbols = ['BTCUSDT', 'BNBUSDT']; // Add the symbols you want to fetch
        $prices = [];

        foreach ($symbols as $symbol) {
            $response = Http::get("https://www.binance.com/api/v3/ticker/price?symbol={$symbol}");
            $result = $response->json();
            $prices[$symbol] = $result['price'];
        }

        return $prices;
    }

    public function apiBank()
    {
        $response = Http::get('https://api.vietqr.io/v2/banks');
        $result = $response->json();
        return $result;
    }

    public function getBankNumberItem($bin,$stk){
        $item = Verify::whereBin($bin)->whereAccountNumber($stk)->first();
        return $item;
    }
    public function checkBankNumber($param)
    {
        $apiCheckUrl = "https://api.vietqr.io/v2/lookup";
        $bankApiKey = env('BANK_API_KEY',"667fcb48-5f5e-46fe-8ccd-28fee0b235e2");
        $bankApiClientId = env('BANK_API_CLIENT_ID',"c879aba7-ed62-4b90-863b-21a144878e0b");
        $response = Http::withHeaders([
            'x-api-key' => $bankApiKey,
            'x-client-id' => $bankApiClientId,
        ])->withBody(json_encode($param), 'application/json')->post($apiCheckUrl);
        $result = $response->json();
        return $result;
    }


    public function verifyBankNumber(Request $request)
    {
        $param = [
            'bin' => $request->bank,
            'accountNumber' => $request->account
        ];
        $uuid = substr(Str::uuid()->toString(), 0, 8);
        // check tk hệ thống
        $verifyItem = $this->getBankNumberItem($request->bank, $request->account);
		if($verifyItem && $verifyItem->status == 0){
			$verifyItem->delete();
			$verifyItem = null;
		}
        if($verifyItem && $verifyItem->status) {
            $result = $verifyItem->toArray();
            session()->put('verifyItem', $verifyItem);
            $verifyTransactions = Transaction::where('user_uuid', $verifyItem->id)->get();
            session()->put('verifyTransactions'.$verifyItem->id, $verifyTransactions);
            $result['transaction_histories'] = $this->transaction_histories();
            return response()->json(['verified' => $verifyItem->status, 'data' => $result]);
        }
        $result = $this->checkBankNumber($param);
        // lưu thông tin
        if($result['code'] == "00") {
            $item = [
                "uuid" => $uuid,
                "bin" => $request->bank,
                "account_number" => $request->account,
                "account_name" => $result['data']['accountName'],
                "bank_name" => $request->bankFullName,
                "amount" => 0,
                "verify_number" => rand(1000, 9999),
                "status" => 0,
                "expired_in" =>  Carbon::now()->addMinutes(15)
            ];
            if (!$verifyItem) {
                $verifyItem = Verify::create($item);
                session()->put('verifyItem',  $verifyItem);
            }else{
                if(Carbon::now()->greaterThan($verifyItem->expired_in)){
                    // làm mới expired_in
                    $item['expired_in'] =  Carbon::now()->addMinutes(15);
                }else{
                    $item['expired_in'] =  $verifyItem->expired_in;
                }
                $verifyItem->update($item);
                session()->put('verifyItem',  $verifyItem);
            }
        }
        $result['transaction_histories'] = $this->transaction_histories();
        return response()->json([...$result, 'uuid' => $uuid]);
    }

    function transaction_histories(){
        $verifyItem = session()->get('verifyItem');
        if ($verifyItem) {
            $verifyTransactions = session()->get('verifyTransactions' . $verifyItem->id);
        }
        ob_start();
        if (isset($verifyTransactions)):
            foreach ($verifyTransactions as $key => $transaction):
                if($key == 5){
                    break;
                }
                ?>
                <span id="top_crypto_table-1-BTC_USDT" class="css-sujoqu" href="">
                    <div class="css-fiavot">
                        <div>
                            <div data-bn-type="text" class="coinRow-coinPrice">
                                <?= $verifyItem->bank_name ?> » mua
                                <?= $transaction->crypto_amount ?>
                                <?= $transaction->state ?></div>
                            <div data-bn-type="text" class="time-history">
                                <?= \Carbon\Carbon::parse($transaction->updated_at)->format('H:i d/m/Y') ?>
                            </div>
                        </div>
                    </div>
                    <div class="css-ej4c9n">
                        <div data-bn-type="text" style="direction:ltr" class="start"> 5 ⭐</div>
                    </div>
                </span>
                <?php
            endforeach;
        endif;
        return ob_get_clean();
    }
}