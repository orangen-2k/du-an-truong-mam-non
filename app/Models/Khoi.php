<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LopHoc;
class Khoi extends Model 
{
    protected $table = 'khoi';
    protected $fillable = 
    [
        "id",
        "ten_khoi"
    ];
    public function LopHoc()
    {
        return $this->hasMany(LopHoc::class,'id','khoi_id');
    }
}
