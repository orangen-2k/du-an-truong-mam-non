<?php

namespace App\Repositories;

use App\Repositories\BaseModelRepository;
use App\Models\Lop;
class LopRepository extends BaseModelRepository
{
    protected $model;
    public function __construct(
        Lop $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getModel()
    {
        return Lop::class;
    }

    public function addLop($data)
    {
      return  $this->model::create($data);
    }   

    public function getAllPhanTrang()
    {
      return  $this->model::OrderBy('created_at','desc')->paginate(5);
    }   
  
}