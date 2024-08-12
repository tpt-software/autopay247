<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coin;
class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'coin_name' => 'USDT',
                'network_name' => 'BEP20',
                'address' => 'USDT address account bank',
                'image' => 'default.png'
            ],[
                'coin_name' => 'BTC',
                'network_name' => 'BEP20',
                'address' => 'BTC address account bank',
                'image' => 'default.png'
            ],[
                'coin_name' => 'BNB',
                'network_name' => 'BEP20',
                'address' => 'BNB address account bank',
                'image' => 'default.png'
            ]
        ];
        foreach ($datas as $data) {
            Coin::create($data);
        }
    }
}