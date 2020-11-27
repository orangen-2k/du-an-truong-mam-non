<?php

namespace App\Models;
use App\Models\Lop;
use App\Models\HocSinh;
use App\Models\GiaoVien;
use Illuminate\Database\Eloquent\Model;

class DonNghiHoc extends Model
{
    protected $table = 'don_nghi_hoc';
    protected $fillable = [
        'id',
        'lop_id',
        'hoc_sinh_id',
        'giao_vien_id',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'noi_dung',
        'trang_thai',
      
    ];
    public function Lop()
    {
        return $this->hasMany(Lop::class,'lop_id','id');
    }
    public function HocSinh()
    {
        return $this->hasMany(HocSinh::class,'hoc_sinh_id','id');
    }
    public function GiaoVien()
    {
        return $this->hasMany(GiaoVien::class,'giao_vien_id','id');
    }


}
