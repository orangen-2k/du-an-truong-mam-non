<?php

namespace App\Repositories;

use App\Repositories\BaseModelRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Khoi;
class KhoiRepository extends BaseModelRepository
{
    protected $model;
    public function __construct(
        Khoi $model
    ) {
        parent::__construct();
        $this->model = $model;
    }


    public function getModel()
    {
        return Khoi::class;
    }

    public function getAllKhoi(){
		return  $this->model->get();
    }

    
    
  
}