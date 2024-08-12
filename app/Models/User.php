<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'cccd',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getRoleNameAttribute(){
        $data = [];
        if( $this->role == self::ROLE_ADMIN){
            $data['class'] = 'primary';
            $data['role'] = 'Quản trị viên';
        }elseif ($this->role == self::ROLE_USER) {
            $data['class'] = 'success';
            $data['role'] = 'Nhân viên';
        }
        return "<span class='text-".$data['class']."'>".$data['role']."</span>";
    }
}
