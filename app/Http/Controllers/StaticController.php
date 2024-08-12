<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Verify;
use App\Models\Order;

class StaticController extends Controller
{
    public function index(Request $request)
    {
        $noneVerify = [];
        $bankVerify = [];
        $cccdVerify = [];
        // Tính tổng doanh thu bán
        $transactions = Transaction::select(['id', 'amount', 'bank_amount', 'state', 'crypto_amount'])->where('status', 1)->get();
        $total_sell = 0;
        $countUsdt = 0;
        $countBtc = 0;
        $countBnb = 0;
        foreach ($transactions as $transaction) {
            $total_sell += $transaction->amount;
        }
        // Tính tổng doanh thu mua
        $orders = Order::select(['id', 'total_payment', 'state_sell', 'want_to_buy'])->where('status', 1)->get();
        $total_buy = 0;
        $buyUsdt = 0;
        $buyBtc = 0;
        $buyBnb = 0;
        foreach ($orders as $order) {
            $total_buy += $order->want_to_buy;
        }
        // dd($data);
        foreach ($transactions as $item) {
            $noneVerify[] = $item->toArray();
        }
        $noKyc_users = Verify::where('status',0)->count();
        $kyc_users = Verify::where('status',1)->count();
        $data = Verify::whereHas('transactions', function ($query) {
            $query->valid();
        })->bankVerify()->get();

        foreach ($data as $item) {
            foreach ($item['transactions'] as $transaction) {
                $bankVerify[] = $transaction->toArray();
            }
        }
        //Tổng user KYC
        $user_kyc = count($noneVerify);
        //Tổng user Không KYC
        $user_no_kyc = count($noneVerify);
        //Tổng doanh thu Không KYC
        //Tổng doanh thu KYC
        //Tổng lợi nhuận KYC
        //Tổng lợi nhuận Không KYC
        // convert to collection
        $noneVerify = collect($noneVerify);
        $bankVerify = collect($bankVerify);
        $cccdVerify = collect($cccdVerify);
        // Tinh doanh số bán 
        $dataStatic = [
            'sell_data' => [
                'USDT' => [
                    'amount' => $noneVerify->whereIn('state', ['USDT'])->sum('amount'),
                    'bank_amount' => $noneVerify->whereIn('state', ['USDT'])->sum('bank_amount'),
                    'crypto_amount' => $noneVerify->whereIn('state', ['USDT'])->sum('crypto_amount'),
                ],
                'BTC' => [
                    'amount' => $noneVerify->whereIn('state', ['BTC'])->sum('amount'),
                    'bank_amount' => $noneVerify->whereIn('state', ['BTC'])->sum('bank_amount'),
                    'crypto_amount' => $noneVerify->whereIn('state', ['BTC'])->sum('crypto_amount'),
                ],
                'BNB' => [
                    'amount' => $noneVerify->whereIn('state', ['BNB'])->sum('amount'),
                    'bank_amount' => $noneVerify->whereIn('state', ['BNB'])->sum('bank_amount'),
                    'crypto_amount' => $noneVerify->whereIn('state', ['BNB'])->sum('crypto_amount'),
                ],
            ],
            'buy_data' => [
                'USDT' => [
                    'want_to_buy' => $orders->where('state_sell', 'USDT')->sum('want_to_buy'),
                    'total_payment' => $orders->where('state_sell', 'USDT')->sum('total_payment'),
                ],
                'BTC' => [
                    'want_to_buy' => $orders->where('state_sell', 'BTC')->sum('want_to_buy'),
                    'total_payment' => $orders->where('state_sell', 'BTC')->sum('total_payment'),
                ],
                'BNB' => [
                    'want_to_buy' => $orders->where('state_sell', 'BNB')->sum('want_to_buy'),
                    'total_payment' => $orders->where('state_sell', 'BNB')->sum('total_payment'),
                ],
            ],

            // 'bankVerify' => [
            //     'USDT' => [
            //         'amount' => $bankVerify->whereIn('state',['USDT'])->sum('amount'),
            //         'bank_amount' => $bankVerify->whereIn('state',['USDT'])->sum('bank_amount'),
            //     ],
            //     'BTC' => [
            //         'amount' => $bankVerify->whereIn('state',['BTC'])->sum('amount'),
            //         'bank_amount' => $bankVerify->whereIn('state',['BTC'])->sum('bank_amount'),
            //     ],
            //     'BNB' => [
            //         'amount' => $bankVerify->whereIn('state',['BNB'])->sum('amount'),
            //         'bank_amount' => $bankVerify->whereIn('state',['BNB'])->sum('bank_amount'),
            //     ],
            // ],
        ];
        $stats = [
            'total_sell' => $total_sell,
            'count_usdt' => $countUsdt,
            'count_btc' => $countBtc,
            'count_bnb' => $countBnb,
        ];
        $buyStats = [
            'total_buy' => $total_buy,
            'buy_usdt' => $buyUsdt,
            'buy_btc' => $buyBtc,
            'buy_bnb' => $buyBnb,
        ];

        return view('admin.static.index', compact('dataStatic', 'noKyc_users', 'kyc_users', 'stats', 'buyStats'));
    }
}