<?php

namespace App\Repositories;

use App\Repositories\BaseModelRepository;
use Illuminate\Support\Facades\DB;
use App\Models\HocSinh;
use Carbon\Carbon;

class HocSinhRepository extends BaseModelRepository
{
    protected $model;
    public function __construct(
        HocSinh $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getModel()
    {
        return HocSinh::class;
    }

    public function getAllHocSinh(){
  		return  $this->model->all();
    }

    public function getMaxId(){
  		return  $this->model->max('id');
    }

    public function createHocSinh($arrayData)
    {
        return $this->model->create($arrayData);
    }

    public function updateHocSinh($key, $arrayData)
    {
        return $this->model->where('id', $key)->update($arrayData);
    }

    public function getOneHocSinh($id)
    {
        return  $this->model->where('id', '=', $id)->first();
    }

    public function getHocSinhByIdTk($id)
    {
        return  $this->model->where('user_id', '=', $id)->get();
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

    public function getAllHocSinhChuaCoLop($gioi_tinh){
        return  $this->model->where('lop_id',0)->where('type',0)->where('gioi_tinh',$gioi_tinh)->count();
    }

    public function getSlHocSinhType($type){
        return  $this->model->where('lop_id',0)->where('type',$type)->count();
    }


    public function getDataHocSinhChuaCoLop($type){
        return  $this->model->where('lop_id',0)->where('type',$type)->get();
    }

    public function xepLopTuDong($id_lop,$do_tuoi,$gioi_tinh,$sl_hs)
    {
        return $this->model
        ->whereRaw('ROUND(DATEDIFF(CURDATE(), ngay_sinh)/365,0)=?',[$do_tuoi])
        ->where("lop_id",0)->where('gioi_tinh',$gioi_tinh)
        ->orderBy('created_at')
        ->limit($sl_hs)
        ->update(["lop_id" => $id_lop]);
    }

    public function getHocSinhChuaCoLopTheoDoTuoi($tuoi,$gioi_tinh)
    {
        return $this->model
        ->whereRaw('ROUND(DATEDIFF(CURDATE(), ngay_sinh)/365,0)= ? ',[$tuoi])
        ->where('gioi_tinh',$gioi_tinh)
        ->where("lop_id",0)
        ->where("type",0)
        ->count();
    }

    public function chuyenLop($lop_id,$id_hs_chuyen_lop)
    {
       return $this->model->whereIn('id',$id_hs_chuyen_lop)->update(['lop_id'=>$lop_id]);
    }

    public function updateHocSinhTn($id_lop,$data)
    {
        return $this->model->where('lop_id',$id_lop)->update($data);

    }
    
}
