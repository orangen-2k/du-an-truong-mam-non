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
    public function getAllGV_limit($params, $limit)
    {
        $data = $this->table;
    
        return $data->paginate($limit);;
    }
    public function getLopHoc($lop_id)
    {
        $data = DB::table('lop_hoc')
        ->join('khoi', 'khoi.id', '=', 'lop_hoc.khoi_id')
        ->select('lop_hoc.ten_lop','khoi.ten_khoi')
        ->where('lop_hoc.id', $lop_id)->first();
        return $data;
    }
    
    public function getModel()
    {
        return GiaoVien::class;
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

    public function store_gv($dataRequest)
    {
        return $this->model::insert($dataRequest);
    }
    public function removeLopGiaoVien($id_gv)
    {
       return $this->model
       ->where('id', $id_gv)
       ->update(['lop_id' => 0,'type'=>0]);
    }

    public function xoaLopGiaoVien($id_lop)
    {
       return $this->model
       ->where('lop_id', $id_lop)
       ->update(['lop_id' => 0,'type'=>0]);
    }

    public function getGiaoVienCuaLop($id_lop)
    {
       return $this->model
       ->where('lop_id', $id_lop)->OrderBy('type','asc')
       ->get();
    }
}