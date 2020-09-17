<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\GiaoVien;

class GiaoVienRepository extends BaseRepository
{
    protected $model;
    public function __construct(
        GiaoVien $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getTable()
    {
        return 'giao_vien';
    }
    public function getAll()
    {
        $data = $this->table
        ->get();
        return $data;
    }
    public function getLopHoc($lop_id)
    {
        $data = DB::table('lop_hoc')
        ->join('khoi', 'khoi.id', '=', 'lop_hoc.khoi_id')
        ->select('lop_hoc.ten_lop','khoi.ten_khoi')
        ->where('lop_hoc.id', $lop_id)->first();
        return $data;
    }
    
}