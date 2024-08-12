<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdImage extends Model
{
    use HasFactory;
    protected $table = 'id_images';
    protected $fillable = [
        'verify_id',
        'id_front',
        'id_back',
        'id_user',

    ];
}
