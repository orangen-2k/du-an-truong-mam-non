<?php

namespace App\Repositories;

use App\Repositories\BaseModelRepository;
use Illuminate\Support\Facades\DB;
use App\Models\DanhSachThuTien;

class DanhSachThuTienRepository extends BaseModelRepository
{

    protected $model;
    public function __construct(
        DanhSachThuTien $model
    ) {
        parent::__construct();
        $this->model = $model;
    }
    public function getModel()
    {
        return DanhSachThuTien::class;
    }

    public function deleteList($array)
    {
        $this->model->destroy($array);
    }

    public function tongTienPhaiDong($id_dot_thu_tien, $khoi_id)
    {
        // dd($id_dot_thu_tien,$khoi_id);
        return $this->model->where('id_dot_thu_tien', $id_dot_thu_tien)->where('khoi_id', $khoi_id)->sum('so_tien_phai_dong');
    }

    public function tongTienDaThu($id_dot_thu_tien, $khoi_id)
    {
        return $this->model->where('id_dot_thu_tien', $id_dot_thu_tien)->where('khoi_id', $khoi_id)->where('trang_thai', 1)->sum('so_tien_da_dong');
    }

    public function soLuongDaThongBao($id_dot_thu_tien, $khoi_id)
    {
        return $this->model->where('id_dot_thu_tien', $id_dot_thu_tien)->where('khoi_id', $khoi_id)->where('thong_bao', 1)->count();
    }

    public function tongSoLuongCanThongBao($id_dot_thu_tien, $khoi_id)
    {

        return $this->model->where('id_dot_thu_tien', $id_dot_thu_tien)->where('khoi_id', $khoi_id)->count();
    }

    public function DotThuTheoLop($id_dot_chi_tiet_thu_tien, $lop_id)
    {
        return $this->model->where('id_dot_thu_tien', $id_dot_chi_tiet_thu_tien)->where('lop_id', $lop_id)->get();
    }

    public function danhSachHocSinhKhoiDot($id_dot_thu_tien, $khoi_id)
    {

        return $this->model->where('id_dot_thu_tien', $id_dot_thu_tien)->where('khoi_id', $khoi_id)->where('trang_thai', 0)->get();
    }

    public function updateThongBaoHocSinhKhoiDot($request)
    {
        // dd($request);
        return $this->model->where('id_dot_thu_tien', $request['dot_thu'])->where('khoi_id', $request['id_khoi'])
            ->update([
                'ngay_bat_dau_thu' => $request['ngay_bat_dau'],
                'ngay_ket_thuc_thu' => $request['ngay_ket_thuc'],
                'thong_bao' => $request['trang_thai_thong_bao']
            ]);
    }

    public function getDanhSachHocSinhtThongBaoTheoLop($danhsach, $lop_id, $dot_id)
    {
        if ($danhsach[0] == 0) {
            return $this->model->where('id_dot_thu_tien', $dot_id)->where('lop_id', $lop_id)->where('trang_thai', 0)->get();
        } else {
            return $this->model->where('id_dot_thu_tien', $dot_id)->whereIn('id_hoc_sinh', $danhsach)->where('trang_thai', 0)->get();
        }
    }

    public function updateThongBaoHocSinhLopDot($request)
    {
        if ($request['danh_sach_hoc_sinh'][0] == 0) {
            return $this->model->where('id_dot_thu_tien', $request['id_dot_chon'])->where('lop_id', $request['id_lop_chon'])
                ->update([
                    'ngay_bat_dau_thu' => $request['ngay_bat_dau'],
                    'ngay_ket_thuc_thu' => $request['ngay_ket_thuc'],
                    'thong_bao' => $request['trang_thai_thong_bao']
                ]);
        } else {

            return $this->model->where('id_dot_thu_tien', $request['id_dot_chon'])->whereIn('id_hoc_sinh', $request['danh_sach_hoc_sinh'])
                ->update([
                    'ngay_bat_dau_thu' => $request['ngay_bat_dau'],
                    'ngay_ket_thuc_thu' => $request['ngay_ket_thuc'],
                    'thong_bao' => $request['trang_thai_thong_bao']
                ]);
        }
    }

    public function getIdDanhSachThuTien($id_dot)
    {
        return  $this->model->where('id_dot_thu_tien',$id_dot)->select('id')->get();
    }

    public function deleteTheoIdDot($id_dot)
    {
        return  $this->model->where('id_dot_thu_tien',$id_dot)->delete();
    }

    public function deleteDanhSachThuTien($danh_sach)
    {
        return  $this->model->whereIn('id_danh_sach_thu_tien',$danh_sach)->delete();
    }

    public function getHocSinhThuTien($id_dot_chi_tiet_thu_tien, $hoc_sinh_id)
    {
        // dd($id_dot_chi_tiet_thu_tien, $hoc_sinh_id);
        return $this->model->where('id_dot_thu_tien', $id_dot_chi_tiet_thu_tien)->where('id_hoc_sinh', $hoc_sinh_id)->first();
    }

    public function DongHocPhiTheoLop($id_hoc_sinh,$id_dot_thu)
    {
        $so_tien = $this->model->where('id_hoc_sinh',$id_hoc_sinh)->where('id_dot_thu_tien',$id_dot_thu)->select('so_tien_phai_dong')->first();
        return  $this->model->where('id_hoc_sinh',$id_hoc_sinh)->where('id_dot_thu_tien',$id_dot_thu)
        ->update(['trang_thai'=>1,'so_tien_da_dong'=>$so_tien['so_tien_phai_dong']]);

    }

    public function huyThuTien($id_hoc_sinh,$id_dot_thu)
    {
        return  $this->model->where('id_hoc_sinh',$id_hoc_sinh)->where('id_dot_thu_tien',$id_dot_thu)
        ->update(['trang_thai'=>0,'so_tien_da_dong'=>0]);
    }
}
