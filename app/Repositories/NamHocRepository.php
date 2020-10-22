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
        return $this->model->OrderBy('id', 'desc')->offset(1)->limit(1)->get();
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

    public function getSlHocSinhTotNgiepTheoNam($id_nam_hoc)
    {
        $data_nam_hoc = $this->model->where('id', $id_nam_hoc)->first();
        $hoc_sinh_tn = 0;
        $khoi = $data_nam_hoc->Khoi()->where('do_tuoi', 5)->get();
        foreach ($khoi as $key => $value) {
            foreach ($value->LopHoc as $key => $lop_hoc) {
                $hoc_sinh_tn += $lop_hoc->LichSuHoc()->count();
            }
        }
        return $hoc_sinh_tn;
    }

    public function hocSinhTotNghiepTheoNam($id_nam_hoc)
    {
        $data_nam_hoc = $this->model->where('id', $id_nam_hoc)->first();
        $khoi = $data_nam_hoc->Khoi()->where('do_tuoi', 5)->get();
        $data_hoc_sinh = [];
        foreach ($khoi as $key => $value) {
            foreach ($value->LopHoc as $key => $lop_hoc) {
                foreach ($lop_hoc->LichSuHoc as $key => $hoc_sinh) {
                    array_push($data_hoc_sinh, $hoc_sinh->HocSinh);
                }
            }
        }

        return $data_hoc_sinh;
    }
}
