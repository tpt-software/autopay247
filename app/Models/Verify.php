<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    use HasFactory;
    protected $table = 'veryfies';
    protected $fillable = [
        'uuid',
        'bin',
        'account_name',
        'account_number',
        'bank_name',
        'verify_number',
        'amount',
        'transaction_id',
        'status',
        'expired_in',
        'type',
        'message_type'
    ];
    const MESSAGE_TYPE_PENDING = 0;
    const MESSAGE_TYPE_VALID = 1;
    const MESSAGE_TYPE_INVALID = 2;
    const MESSAGE_TYPE_SENT_CODE = 3;
    const VERIFY_NONE = 0;
    const VERIFY_BANK = 1;
    const VERIFY_CCCD = 2;
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class,'user_uuid');
    }

    public function scopeNoneVerify(){
        return $this->whereType(self::VERIFY_NONE);
    }
    public function scopeBankVerify(){
        return $this->whereType(self::VERIFY_BANK);
    }
    public function scopeCccdVerify(){
        return $this->whereType(self::VERIFY_CCCD);
    }
}