<?php

namespace App\Repositories;

use App\Repositories\BaseModelRepository;
use App\Models\GiaoVien;
class GiaoVienRepository extends BaseModelRepository
{
    protected $model;
    public function __construct(
        GiaoVien $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getModel()
    {
        return GiaoVien::class;
    }

    public function getAll(){
		return  $this->model->get();
    }

    public function getGIaoVienChuaCoLop(){
		return  $this->model->where('lop_id',0)->get();
    }

    public function phanLopGiaoVienCn($id_gv,$id_lop)
    {
       return $this->model
       ->where('id', $id_gv)
       ->update(['lop_id' => $id_lop,'type'=>1]);
    }

    public function phanLopGiaoVienPhu($id_gv,$id_lop)
    {
       return $this->model
       ->where('id', $id_gv)
       ->update(['lop_id' => $id_lop,'type'=>2]);
    }
}