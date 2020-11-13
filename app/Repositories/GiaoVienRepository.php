<?php

namespace App\Repositories;

use App\Models\GiaoVien;
use App\Repositories\BaseModelRepository;
use Illuminate\Support\Facades\DB;

class GiaoVienRepository extends BaseModelRepository
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
        $data = $this->model
            ->get();
        return $data;
    }
    public function getAllGV_limit($params, $limit)
    {
        $data = $this->model;

        return $data->paginate($limit);
    }
    public function getLopHoc($lop_id)
    {
        $data = DB::table('lop_hoc')
            ->join('khoi', 'khoi.id', '=', 'lop_hoc.khoi_id')
            ->select('lop_hoc.ten_lop', 'khoi.ten_khoi')
            ->where('lop_hoc.id', $lop_id)->first();
        return $data;
    }

    public function getModel()
    {
        return GiaoVien::class;
    }

    public function getGIaoVienChuaCoLop()
    {
        return $this->model->where('lop_id', 0)->get();
    }

    public function phanLopGiaoVienCn($id_gv, $id_lop)
    {
        return $this->model
            ->where('id', $id_gv)
            ->update(['lop_id' => $id_lop, 'type' => 1]);
    }

    public function phanLopGiaoVienPhu($id_gv, $id_lop)
    {
        return $this->model
            ->where('id', $id_gv)
            ->update(['lop_id' => $id_lop, 'type' => 2]);
    }

    public function store_gv($dataRequest)
    {
        return $this->model::insert($dataRequest);
    }
    public function removeLopGiaoVien($id_gv)
    {
        return $this->model
            ->where('id', $id_gv)
            ->update(['lop_id' => 0, 'type' => 0]);
    }

    public function xoaLopGiaoVien($id_lop)
    {
        return $this->model
            ->where('lop_id', $id_lop)
            ->update(['lop_id' => 0, 'type' => 0]);
    }

    public function getGiaoVienCuaLop($id_lop)
    {
        return $this->model
            ->where('lop_id', $id_lop)->OrderBy('type', 'asc')
            ->get();
    }

    public function getGV($id, $lop_id)
    {   
        $data = $this->model;
        if ($lop_id > 0) {
            $data = $data
                ->join('lop_hoc', 'lop_hoc.id', '=', 'giao_vien.lop_id')
                ->select('lop_hoc.khoi_id', 'giao_vien.*');
        }
        $data = $data->where('giao_vien.id', $id)->first();
        return $data;
    }

    public function update_gv($id, $data)
    {
        return $this->table->where('id', $id)->update($data);
    }

    public function destroy_gv($id)
    {
        return $this->table->where('id', $id)->delete();
    }

    public function getWhereAndWhere($whereField = [], $columns = ['*'])
    {
        $query = $this->model;
        if (count($whereField) > 0) {
            foreach ($whereField as $key => $val) {
                $query->where($key, $val);
            }
        }

        return $query->get($columns);
    }

    public function getGiaoVienInLichSuDay($id)
    {
        $query = DB::table('lich_su_day')
        ->join('giao_vien', 'giao_vien.id', '=', 'lich_su_day.giao_vien_id')
        ->select('giao_vien.*')
        ->where('lich_su_day.lop_id', $id)
        ->get();
        return $query;
    }

    public function getAllGvTheoUser(){
        $query = $this->model
        ->join('users', 'users.id', '=', 'giao_vien.user_id')
        ->select('giao_vien.*', 'users.active')
        ->where('users.active', 1)
        ->get();
        return $query;
    }

}
