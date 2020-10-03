<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GiaoVien;
use App\Models\HocSinh;
use App\Models\Khoi;

class Lop extends Model
{
    protected $table = 'lop_hoc';
    protected $fillable = [
        'khoi_id',
        'ten_lop',
    ];

    public function GiaoVien()
    {
        return $this->hasMany(GiaoVien::class,'lop_id','id');
    }

    public function HocSinh()
    {
        return $this->hasMany(HocSinh::class,'lop_id','id');
    }

    public function Khoi()
    {
        return $this->belongsTo(Khoi::class);
    }

    public function getGiaoVienPhuAttribute()
    {
        return $this->hasMany(GiaoVien::class)->select('id','ten','ma_gv')->where('type',2)->get();    
    }

    public function getGiaoVienChuNhiemAttribute()
    {
        return $this->hasMany(GiaoVien::class)->select('id','ten','ma_gv')->where('type',1)->first();    
    }

    public function getTongSoHocSinhAttribute()
    {
        return $this->hasMany(HocSinh::class)->where('lop_id',$this->id)->count();    
    }
}
