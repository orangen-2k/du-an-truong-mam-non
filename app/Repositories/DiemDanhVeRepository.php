<?php

namespace App\Repositories;

use App\Repositories\BaseModelRepository;
use Illuminate\Support\Facades\DB;
use App\Models\DiemDanhVe;

class DiemDanhVeRepository extends BaseModelRepository {

    protected $model;
    public function __construct(
        DiemDanhVe $model
    ) {
        parent::__construct();
        $this->model = $model;
    }
    public function getTable()
    {
        return 'diem_danh_ve';
    }

    public function getModel()
    {
        return DiemDanhVe::class;
    }
    
    public function soNgayVaoLopTraMuonTheoThang($hoc_sinh_id, $nam, $thang)
    {
        $data = $this->model
        ->whereYear('ngay_diem_danh_ve', $nam)
        ->whereMonth('ngay_diem_danh_ve', $thang)
        ->where('hoc_sinh_id', $hoc_sinh_id)
        ->where('trang_thai', 4)
        ->count();
        return $data;
    }
}