<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    protected $table = 'thong_bao';
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'auth_id',
    ];
}
