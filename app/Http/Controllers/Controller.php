<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
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
    public function prices()
    {
        $cachedData = Cache::get('Binance_Price');
        if( $cachedData ){
            return $cachedData;
        }else{
            $priceUsdt = $this->getPrice();
            $priceBnb = $this->getPriceBinance();
            $response = [
                'USDT' => $priceUsdt,
                'BNB' => $priceBnb['BNBUSDT'],
                'BTC' => $priceBnb['BTCUSDT'],
            ];
            $cachedData = $response;
            Cache::put('Binance_Price', $cachedData, now()->addMinutes(1));
        }
        return $response;
    }
}
