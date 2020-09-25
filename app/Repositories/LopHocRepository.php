<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\LopHoc;
class LopHocRepository extends BaseRepository
{
    protected $model;
    public function __construct(
        LopHoc $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getTable()
    {
        return 'lop_hoc';
    }

    public function getAllLopHoc(){
  		return  $this->model->get();
    }

    public function getLopHocOfKhoi($id){
	  	return  $this->model->where('khoi_id','=',$id)->get();
    }

    public function getOneLop($id){
	  	return  $this->model->where('id','=',$id)->first();
    }

    public function getOneKhoiTheoLop($lop_id)
    {
        $data = $this->table
        ->join('khoi', 'khoi.id', '=', 'lop_hoc.khoi_id')
        ->select('khoi.ten_khoi',)
        ->where('lop_hoc.id', $lop_id);
        return $data->first();
    }
    
  
}