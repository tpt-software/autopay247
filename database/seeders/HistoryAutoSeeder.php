<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class HistoryAutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $banks = [
            'Vietcombank',
            'VietinBank',
            'BIDV',
            'ACB',
            'Sacombank',
            'Techcombank',
            'MBBank',
            'TPBank',
            'Maritime Bank',
            'DongA Bank',
            'HDBank',
            'Sacombank',
            'Eximbank',
            'VIB',
            'SHB',
            'VPBank',
            'Viet Capital Bank',
            'OCB',
            'Agribank',
            'SeABank'
        ];
        $types = ['mua', 'bán'];

        for ($i = 0; $i < 500; $i++) {
            $coinType = $this->getCoinType($i);
            $amount = $this->getCoinAmount($coinType);
            $stk = $faker->numerify('#####') . '...'; // Tạo stk với 5 số ngẫu nhiên và dấu ...

            DB::table('history_auto')->insert([
                'bank' => $faker->randomElement($banks),
                'type' => $faker->randomElement($types),
                'name_coin' => $coinType,
                'amount_coin' => $amount,
                'time' => $faker->numberBetween(1, 59), // Thời gian từ 1 đến 59 phút
                'stk' => $stk
            ]);
        }
    }

    private function getCoinType($index)
    {
        if ($index < 400) return 'USDT'; // 80%
        if ($index < 475) return 'BNB';  // 15%
        return 'BTC';                    // 5%
    }

    private function getCoinAmount($coinType)
    {
        switch ($coinType) {
            case 'USDT':
                return random_float(20, 10000);
            case 'BTC':
                return random_float(0.1, 0.3);
            case 'BNB':
                return random_float(0.3, 20);
        }
    }

}
function random_float($min, $max)
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }
