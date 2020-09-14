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

    
    
  
}