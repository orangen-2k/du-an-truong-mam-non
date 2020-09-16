<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\HocSinhDangKyNhapHoc;
class DangKiNhapHocRepository extends BaseRepository
{
    protected $model;
    public function __construct(
        HocSinhDangKyNhapHoc $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getTable()
    {
        return 'hoc_sinh_dang_ky_nhap_hoc';
    }

    public function getAllHocSinhDangKy(){
  		return  $this->model->get();
    }

    public function getOneHocSinhDangKy($id){
        return $this->model->where('id',$id)->first();
    }

    public function createHocSinhDangKy($arrayData){
        return $this->model->insertGetId($arrayData);
    }
    

    public function updateHocSinhDangKy($key,$arrayData){
		return $this->model->where('id',$key)->update($arrayData);
	}


    
  
}