<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HocSinh;
use App\Models\Lop;

class LichSuDay extends Model
{
    protected $table = 'lich_su_day';
    protected $fillable = 
    [
        "giao_vien_id",
        'lop_id',
    ];
    public function LopHoc()
    {
        return $this->belongsto(Lop::class,'lop_id','id');
    }

    // public function HocSinh()
    // {
    //     return $this->belongsto(HocSinh::class,'hoc_sinh_id','id');
    // }
}
