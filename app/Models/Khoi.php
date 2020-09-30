<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lop;
class Khoi extends Model 
{
    protected $table = 'khoi';
    protected $fillable = 
    [
        "id",
        "ten_khoi",
        'do_tuoi',
        'nam_hoc_id',
    ];
    public function LopHoc()
    {
        return $this->hasMany(Lop::class,'khoi_id','id');
    }
}
