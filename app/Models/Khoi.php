<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khoi extends Model
{
    protected $table = 'khoi';
    protected $fillable = [
        'ten_khoi',
    ];
}
