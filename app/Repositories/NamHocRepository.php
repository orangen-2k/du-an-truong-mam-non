<?php

namespace App\Repositories;

use App\Models\NamHoc;
use App\Repositories\BaseModelRepository;
use Carbon\Carbon;

class NamHocRepository extends BaseModelRepository
{
    protected $model;
    public function __construct(
        NamHoc $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getModel()
    {
        return NamHoc::class;
    }

    public function getAllNamHoc()
    {
        return $this->model::orderBy('start_date', 'desc')->get();
    }

    public function layNamHocHienTai()
    {
        return $this->model::whereDate('start_date', '<=', Carbon::now())
            ->whereDate('end_date', '>=', Carbon::now())->first();
    }
    public function getNamHocCu()
    {
        return $this->model->OrderBy('id','desc')->offset(1)->limit(1)->get();
    }

    public function maxID()
    {
        return $this->model->max('id');
    }
    public function checkNew()
    {
        $data = $this->model::where('type', 1)->get();
        return count($data) > 0 ? 0 : 1;
    }
    
}
