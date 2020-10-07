<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Repositories\LopHocRepository;
use \App\Repositories\KhoiRepository;
use \App\Repositories\HocSinhRepository;
use \App\Repositories\GiaoVienRepository;
use App\Repositories\TinhThanhPhoRepository;
use App\Repositories\QuanHuyenRepository;
use App\Repositories\XaPhuongThiTranRepository;
use App\Repositories\DoiTuongChinhSachRepository;
use Illuminate\Support\Facades\DB;
use App\Repositories\NamHocRepository;

class QuanLyTrongNamController extends Controller
{
    protected $LopHocRepository;
    protected $KhoiRepository;
    protected $HocSinhRepository;
    protected $GiaoVienRepository;
    protected $TinhThanhPhoRepository;
    protected $QuanHuyenRepository;
    protected $XaPhuongThiTranRepository;
    protected $DoiTuongChinhSachRepository;
    protected $NamHocRepository;
    public function __construct(
        LopHocRepository $LopHocRepository,
        KhoiRepository $KhoiRepository,
        HocSinhRepository $HocSinhRepository,
        GiaoVienRepository $GiaoVienRepository,
        TinhThanhPhoRepository $TinhThanhPhoRepository,
        QuanHuyenRepository  $QuanHuyenRepository,
        XaPhuongThiTranRepository  $XaPhuongThiTranRepository,
        DoiTuongChinhSachRepository $DoiTuongChinhSachRepository,
        NamHocRepository $NamHocRepository
        
        
    ){
        $this->LopHocRepository = $LopHocRepository;
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
        return view('nam-hoc.chi_tiet_nam_hoc',[
            'sl_hs_chua_co_lop' => $sl_hs_chua_co_lop,
            'namhoc' => $namhoc,
            'id_nam_hoc' =>$id,
            'khoi' => $khoi,
            'giao_vien' => $giao_vien,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
