<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KhoanThu;
class ChiTietDongTienHocSinh extends Model
{
    protected $table = 'chi_tiet_dong_tien_hoc_sinh';
    protected $fillable = 
    [
        "id",
        "id_khoan_thu",
        "id_danh_sach_thu_tien",
        "so_tien",
    ];

    public function KhoanThu()
    {
        return $this->belongsTo(KhoanThu::class,'id_khoan_thu','id');
    }
}
