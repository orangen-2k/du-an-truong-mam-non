<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Khoi;

class KhoiRepository extends BaseRepository 
{
    protected $model;
    public function __construct(
        Khoi $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getTable()
    {
        return 'khoi';
    }

    public function getAllKhoi(){
		return  $this->model->get();
    }

    public function getAll()
    {   
        $data = $this->table->get();
        return $data;
    }
    public function LopHoc($khoi_id)
    {
        $data = DB::table('lop_hoc')
        
        ->where('khoi_id', $khoi_id)
        ->get();
       
        return $data;
    }
    public function HocSinh($lop_id)
    {
        $data = DB::table('hoc_sinh')
        ->where('lop_id', $lop_id)
        ->get();
        return $data;
    }

    public function post_create($arr)
    {   
        unset($arr['_token']);
        return $this->model::insert($arr);
    }
    public function destroy($id)
    {
        return $this->model::where('id', $id)->delete();
    }

    public function store($arr, $id)
    {   unset($arr['_token']);
        return $this->model::where('id', $id)->update($arr);
    }

}