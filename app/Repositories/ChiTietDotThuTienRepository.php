<?php

namespace App\Repositories;

use App\Repositories\BaseModelRepository;
use Illuminate\Support\Facades\DB;
use App\Models\ChiTietDotThuTien;

class ChiTietDotThuTienRepository extends BaseModelRepository {
    protected $model;
    public function __construct(
        ChiTietDotThuTien $model
    ) {
        parent::__construct();
        $this->model = $model;
    }
    public function getModel()
    {
        return ChiTietDotThuTien::class;
    }
    
}