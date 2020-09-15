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
  		return  $this->model->get();
    }

    public function createHocSinh($arrayData){
        return $this->model->insert($arrayData);
    }

    public function updateHocSinh($key,$arrayData){
		return $this->model->where('id',$key)->update($arrayData);
	}

    public function getOneHocSinh($id){
	  	return  $this->model->where('id','=',$id)->first();
    }
    
  
}