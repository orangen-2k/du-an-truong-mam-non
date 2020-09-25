<?php

namespace App\Repositories;

use App\Models\NamHoc;
use App\Repositories\BaseModelRepository;

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
}
