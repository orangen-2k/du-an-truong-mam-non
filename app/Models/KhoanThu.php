<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use APP\Models\PhamViThu;

class KhoanThu extends Model
{
    protected $table = 'khoan_thu';
    protected $fillable = 
    [
        "id",
        "ten_khoan_thu",
        "muc_thu",
        "pham_vi_thu",
        "mien_giam",
        "xuat_hoa_don",
        "theo_doi"
    ];

    public function PhamViThu()
    {
        return $this->hasMany(PhamViThu::class,'id_khoan_thu','id');
    }

    protected static function booted()
    {
        static::deleting(function ($khoanthu) {
            $khoanthu->PhamViThu->each->delete();
        });
    }
}
