<?php

namespace App\Repositories;

use App\Repositories\BaseModelRepository;
use Illuminate\Support\Facades\DB;
use App\Models\DotThuTien;

class QuanLyDotThuRepository extends BaseModelRepository {

    protected $model;
    public function __construct(
        DotThuTien $model
    ) {
        parent::__construct();
        $this->model = $model;
    }
    public function getModel()
    {
        return DotThuTien::class;
    }

    public function deleteList($array)
    {
        $this->model->destroy($array);
    }

    public function kiemTraTonTaiDotThu($year , $month)
    {
       return $this->model->where('nam_thu',$year)->where('thang_thu',$month)->first();
    }



    

    
}