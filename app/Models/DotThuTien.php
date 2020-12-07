<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use APP\Models\KhoanThu;
use APP\Models\ChiTietDotThuTien;


class DotThuTien extends Model
{
    protected $table = 'dot_thu_tien';
    protected $fillable = 
    [
        "id",
        "thang_thu",
        "nam_thu",
        'id_nam_hoc'
    ];

    public function ChiTietDotThuTien()
    {
        return $this->hasMany(ChiTietDotThuTien::class,'id_dot_thu_tien','id');
    }
}
