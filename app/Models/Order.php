<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'verify_id',
        'state_sell',
        'want_to_buy',
        'total_payment',
        'network',
        'wallet_address',
        'type',
        'status',
        'uuid',
    ];

    const STATUS_PENDING = 0;//Chờ chuyển
    const STATUS_VALID = 1;//Đã hoàn thành
    const STATUS_PAID = 2;//Chờ kiểm tra thanh toán
    const STATUS_UNPAID_FULL = 3;//Thanh toán thiếu
    const STATUS_INVALID = 4;//Số TK không khớp

    public function verify()
    {
        return $this->belongsTo(Verify::class);
    }
	public static function getStatues(){
        $statues = [
            self::STATUS_PENDING    => 'Chờ thanh toán',
            self::STATUS_VALID      => 'Đã hoàn thành',
            self::STATUS_PAID       => 'Chờ kiểm tra thanh toán',
            self::STATUS_UNPAID_FULL=> 'Thanh toán thiếu',
            self::STATUS_INVALID    => 'Số TK không khớp',
        ];
        return $statues;
    }
	public static function getStatue($status){
        $statues = [
            self::STATUS_PENDING    => 'Chờ thanh toán',
            self::STATUS_VALID      => 'Đã hoàn thành',
            self::STATUS_PAID       => 'Chờ kiểm tra thanh toán',
            self::STATUS_UNPAID_FULL=> 'Thanh toán thiếu',
            self::STATUS_INVALID    => 'Số TK không khớp',
        ];
        return $statues[$status];
    }
}
