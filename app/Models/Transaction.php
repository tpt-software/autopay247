<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Verify;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'amount',
        'bank_amount',
        'crypto_amount',
        'state',
        'network',
        'address_wallet',
        'expired_in',
        'qrCode',
        'status',
        'user_uuid'
    ];
    const STATUS_PENDING = 0;//Chờ thanh toán
    const STATUS_VALID = 1;//Đã hoàn thành
    const STATUS_PAID = 2;//Chờ kiểm tra thanh toán
    const STATUS_UNPAID_FULL = 3;//Thanh toán thiếu
    const STATUS_INVALID = 4;//Số TK không khớp
    const STATUS_TRANSFER_FAIL = 5;//Số TK không khớp
    public function verify(){
        return $this->belongsTo(Verify::class,'user_uuid');
    }
    public function scopeValid(){
        return $this->whereStatus(self::STATUS_VALID);
    }

    public static function getStatues(){
        $statues = [
            self::STATUS_PENDING    => 'Chờ thanh toán',
            self::STATUS_VALID      => 'Đã hoàn thành',
            self::STATUS_PAID       => 'Chờ kiểm tra thanh toán',
            self::STATUS_UNPAID_FULL=> 'Thanh toán thiếu',
            self::STATUS_INVALID    => 'Số TK không khớp',
            self::STATUS_TRANSFER_FAIL    => 'Chuyển coin thất bại',
        ];
        return $statues;
    }
}
