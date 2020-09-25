<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\HocSinh;

class HocSinhRepository extends BaseRepository
{
    protected $model;
    public function __construct(
        HocSinh $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getTable()
    {
        return 'hoc_sinh';
    }

    public function getAllHocSinh(){
  		return  $this->model->all();
    }

    public function createHocSinh($arrayData)
    {
        return $this->model->insert($arrayData);
    }

    public function updateHocSinh($key, $arrayData)
    {
        return $this->model->where('id', $key)->update($arrayData);
    }

    public function getOneHocSinh($id)
    {
        return  $this->model->where('id', '=', $id)->first();
    }

    public function xoaLopHocSinh($lop_id)
    {
        return  $this->model->where('lop_id', $lop_id)->update(['lop_id' => 0]);
    }

    public function getHocSinhCuaLop($lop_id,$params)
    {
        $queryBulder = $this->model::query();
        $queryBulder->where('lop_id', '=', $lop_id);
        if (isset($params['gioi_tinh']) && $params['gioi_tinh'] != null) {
            $queryBulder->where('gioi_tinh', '=', $params['gioi_tinh']);
        }
        return $queryBulder->OrderBy('created_at','desc')->get();
    }

    public function getHocSinh()
    {
        return  $this->model->select('ten','ma_hoc_sinh','gioi_tinh','avatar','tuoi','lop_id')->paginate(10);
    }
    public function getAllHocSinh_table($params, $limit)
    {
        $data = $this->table;
        return $data->paginate($limit);
    }
    
}
