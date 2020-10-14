<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Repositories\LopRepository;
use \App\Repositories\KhoiRepository;
use \App\Repositories\HocSinhRepository;
use \App\Repositories\GiaoVienRepository;
use App\Repositories\TinhThanhPhoRepository;
use App\Repositories\QuanHuyenRepository;
use App\Repositories\XaPhuongThiTranRepository;
use App\Repositories\DoiTuongChinhSachRepository;
use Illuminate\Support\Facades\DB;
use App\Repositories\NamHocRepository;
use App\Models\LichSuDay;
use App\Models\LichSuHoc;

use Carbon\Carbon;

class QuanLyTrongNamController extends Controller
{
    protected $LopRepository;
    protected $KhoiRepository;
    protected $HocSinhRepository;
    protected $GiaoVienRepository;
    protected $TinhThanhPhoRepository;
    protected $QuanHuyenRepository;
    protected $XaPhuongThiTranRepository;
    protected $DoiTuongChinhSachRepository;
    protected $NamHocRepository;
    public function __construct(
        LopRepository $LopRepository,
        KhoiRepository $KhoiRepository,
        HocSinhRepository $HocSinhRepository,
        GiaoVienRepository $GiaoVienRepository,
        TinhThanhPhoRepository $TinhThanhPhoRepository,
        QuanHuyenRepository  $QuanHuyenRepository,
        XaPhuongThiTranRepository  $XaPhuongThiTranRepository,
        DoiTuongChinhSachRepository $DoiTuongChinhSachRepository,
        NamHocRepository $NamHocRepository


    ) {
        $this->LopRepository = $LopRepository;
        $this->KhoiRepository = $KhoiRepository;
        $this->HocSinhRepository = $HocSinhRepository;
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->TinhThanhPhoRepository = $TinhThanhPhoRepository;
        $this->QuanHuyenRepository = $QuanHuyenRepository;
        $this->XaPhuongThiTranRepository = $XaPhuongThiTranRepository;
        $this->DoiTuongChinhSachRepository = $DoiTuongChinhSachRepository;
        $this->NamHocRepository = $NamHocRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $khoi = $this->Khoi->getAllKhoi();  
    //     return view('quan-ly-hoc-sinh.index',compact('khoi'));
    // }
    public function index($id)
    {
        $khoi = $this->KhoiRepository->getAll();
        $giao_vien = $this->GiaoVienRepository->getGIaoVienChuaCoLop();
        $namhoc = $this->NamHocRepository->find($id);
        $sl_hs_chua_co_lop = $this->HocSinhRepository->getSlHocSinhChuaCoLop();
        // dd($hocsinh);
        return view('nam-hoc.chi_tiet_nam_hoc', [
            'sl_hs_chua_co_lop' => $sl_hs_chua_co_lop,
            'namhoc' => $namhoc,
            'id_nam_hoc' => $id,
            'khoi' => $khoi,
            'giao_vien' => $giao_vien,
        ]);
    }

    public function getchuyenDuLieuNamHoc($id)
    {
        $nam_hoc_cu = $this->NamHocRepository->getNamHocCu();
        $nam_hoc_moi = $this->NamHocRepository->find($id);
        $khoi = $nam_hoc_cu[0]->Khoi;
        $lop = [];
        foreach ($khoi as $key => $value) {
            array_push($lop, $value->LopHoc);
        }
        $collection = collect($lop);
        $data_lop_cu = $collection->collapse();
        $data_lop_cu->all();
        // dd($data_lop_cu[10]->LenLopTiepTheo);
        // dd($nam_hoc_cu[0]->name,$nam_hoc_moi->name);
        return view(
            'nam-hoc.chuyen_du_lieu_nam_hoc',
            [
                'nam_hoc_moi' => $nam_hoc_moi,
                'nam_hoc_cu' => $nam_hoc_cu[0],
                'data_lop_cu' => $data_lop_cu
            ]
        );
    }

    public function duLieuLenLop($id)
    {
        $nam_hoc_cu = $this->NamHocRepository->getNamHocCu();
        $khoi = $nam_hoc_cu[0]->Khoi;
        $lop = [];
        foreach ($khoi as $key => $value) {
            array_push($lop, $value->LopHoc);
        }
        $collection = collect($lop);
        $data_lop_cu = $collection->collapse();
        $data_lop_cu->all();
      
        foreach ($data_lop_cu as $key => $value) {
            $da_len_lop = LichSuHoc::where('lop_id', '=', $value->id)->count();
            if ($da_len_lop > 0) {
                $value->tong_hoc_sinh = $value->TongSoHocSinhLopCu;
            }else{
                $value->tong_hoc_sinh = $value->TongSoHocSinh;
            }
            
            $value->len_lop_tiep_theo = $value->LenLopTiepTheo;
        }

        return $data_lop_cu;
    }

    public function postchuyenDuLieuNamHoc(Request $request)
    {
        $id = $request->nam_hoc_moi;
        $nam_hoc_cu = $this->NamHocRepository->getNamHocCu();
        $nam_hoc_moi = $this->NamHocRepository->find($id);
        $khoi = $nam_hoc_cu[0]->Khoi;
        if (count($nam_hoc_moi->Khoi) > 0) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        foreach ($khoi as $key => $value) {
            $value->nam_hoc_id = $id;
            $lop = $value->LopHoc;
            $id_khoi = $this->KhoiRepository->create($value->toArray())->id;
            foreach ($lop as $key_lop => $value_lop) {
                $value_lop->khoi_id = $id_khoi;
                $id_lop = $this->LopRepository->create($value_lop->toArray())->id;
                $giao_vien =  $this->GiaoVienRepository->getGiaoVienCuaLop($value_lop->id);
                $lich_su_day = [];
                foreach ($giao_vien as $key => $value) {
                    array_push(
                        $lich_su_day,
                        [
                            'giao_vien_id' => $value->id,
                            'lop_id' => $value->lop_id,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]
                    );
                    $this->GiaoVienRepository->update($value->id, ['lop_id' => $id_lop]);
                }
                LichSuDay::insert($lich_su_day);
            }
        }
    }

    public function getDuLieuKhoiLopNamMoi(Request $request)
    {
        $id  = $request->id;
        $nam_hoc_moi = $this->NamHocRepository->find($id);
        $khoi = $nam_hoc_moi->Khoi;
        $lop = [];
        foreach ($khoi as $key => $value) {
            array_push($lop, $value->LopHoc);
        }
        $collection = collect($lop);
        $data_lop_moi = $collection->collapse();
        $data_lop_moi->all();

        foreach ($data_lop_moi as $key => $value) {
            $data_lop_moi->giao_vien_cn = isset($value->GiaoVienChuNhiem) ? $value->GiaoVienChuNhiem['ten'] : '';
            $data_lop_moi->ten_khoi = $value->Khoi['ten_khoi'];
        }
        // dd($nam_hoc_cu[0]->name,$nam_hoc_moi->name);
        return [
            'data_lop_moi' => $data_lop_moi
        ];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function leLopChoHocSinh(Request $request)
    {
        $data_len_lop = $request->data_len_lop;
        $lich_su_hoc = [];
        foreach ($data_len_lop as $key => $value) {
            $item = json_decode($value);
            $da_len_lop = LichSuHoc::where('lop_id', '=', $item[0])->count();
            if ($da_len_lop > 0) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            if ($item[1] == -2) {
                $hoc_sinh_tot_nghiep = $this->HocSinhRepository->getHocSinhCuaLop($item[0], []);
                foreach ($hoc_sinh_tot_nghiep as $key_hs_tn => $value_hs_tn) {
                    array_push(
                        $lich_su_hoc,
                        [
                            'hoc_sinh_id' => $value_hs_tn->id,
                            'lop_id' => $value_hs_tn->lop_id,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]
                    );
                }
                $this->HocSinhRepository->updateHocSinhTn($item[1], ['lop_id' => 0, 'type' => 3]);
            } elseif ($item[1] == -1) {
                $hoc_sinh_cua_lop = $this->HocSinhRepository->getHocSinhCuaLop($item[0], []);
                foreach ($hoc_sinh_cua_lop as $key => $value) {
                    array_push(
                        $lich_su_hoc,
                        [
                            'hoc_sinh_id' => $value->id,
                            'lop_id' => $value->lop_id,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]
                    );
                }
                $this->HocSinhRepository->updateHocSinhTn($item[1], ['lop_id' => 0, 'type' => 1]);
            } else {
                $hoc_sinh_cua_lop = $this->HocSinhRepository->getHocSinhCuaLop($item[0], []);
                foreach ($hoc_sinh_cua_lop as $key => $value) {
                    array_push(
                        $lich_su_hoc,
                        [
                            'hoc_sinh_id' => $value->id,
                            'lop_id' => $value->lop_id,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]
                    );
                }
                $this->HocSinhRepository->updateHocSinhTn($item[0], ['lop_id' => $item[1]]);
            }
        }
        LichSuHoc::insert($lich_su_hoc);
    }

    public function getDuLieuNamHocMoiLenLop()
    {
        $id = $this->NamHocRepository->maxID();
        $nam_hoc_moi = $this->NamHocRepository->find($id);
        $khoi = $nam_hoc_moi->Khoi;

        $lop = [];
        foreach ($khoi as $key => $value) {
            array_push($lop, $value->LopHoc);
        }
        $collection = collect($lop);
        $data_lop_moi = $collection->collapse();
        $data_lop_moi->all();
        foreach ($data_lop_moi as $key => $value) {
            $value->tong_hoc_sinh = $value->TongSoHocSinh;
        }

        return $data_lop_moi;
    }
}
