<?php

namespace App\Http\Controllers;

use App\Models\DonNghiHoc;
use App\Models\HocSinh;
use Illuminate\Http\Request;
use App\Models\GiaoVien;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Repositories\GiaoVienRepository;
use App\Repositories\HocSinhRepository; 
use App\Repositories\LopHocRepository;


class QuanLyDonNghiHocController extends Controller
{
    protected $HocSinhRepository;
    protected $GiaoVienRepository;
    protected $LopHocRepository;
  
    public function __construct(
        GiaoVienRepository $GiaoVienRepository,
        HocSinhRepository $HocSinhRepository,
        LopHocRepository $LopHocRepository
    ) {
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->HocSinhRepository = $HocSinhRepository;
        $this->LopHocRepository=$LopHocRepository;
    }
    public function index(){
    $hoc_sinh=HocSinh::all();
    $gv=GiaoVien::all();
    $giao_vien=$this->GiaoVienRepository->getAll();
    $lop=$this->LopHocRepository->getAllLopHoc();
    $don_nghi_hoc=DonNghiHoc::all();
    return view('quan-ly-don-nghi-hoc.index',compact('hoc_sinh','giao_vien','lop','don_nghi_hoc','gv'));
    }
}
