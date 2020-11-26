<?php

namespace App\Repositories;

use App\Repositories\BaseModelRepository;
use Illuminate\Support\Facades\DB;
use App\Models\KhoanThu;

class QuanLyKhoanThuRepository extends BaseModelRepository {

    protected $model;
    public function __construct(
        KhoanThu $model
    ) {
        parent::__construct();
        $this->model = $model;
    }
    public function getModel()
    {
        return KhoanThu::class;
    }

    public function deleteList($array)
    {
        $this->model->destroy($array);
    }



    

    
}