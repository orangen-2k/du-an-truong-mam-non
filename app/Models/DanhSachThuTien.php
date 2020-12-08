<?php

namespace App\Models;
use App\Models\Lop;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChiTietDongTienHocSinh;
use App\Models\HocSinh;

class DanhSachThuTien extends Model
{
    protected $table = 'danh_sach_thu_tien';
    protected $fillable = 
    [
        "id",
        "id_dot_thu_tien",
        "id_hoc_sinh",
        "so_tien_phai_dong",
        "thong_bao",
        "ngay_bat_dau_thu",
        "ngay_ket_thuc_thu",
        "trang_thai",
        "khoi_id",
        "lop_id"
    ];

    public function Lop()
    {
        return $this->belongsTo(Lop::class,'lop_id','id');
    }

    public function HocSinh()
    {
        return $this->belongsTo(HocSinh::class,'id_hoc_sinh','id');
    }

    public function ChiTietDongTienHocSinh()
    {
        return $this->hasMany(ChiTietDongTienHocSinh::class,'id_danh_sach_thu_tien','id');
    }
}
