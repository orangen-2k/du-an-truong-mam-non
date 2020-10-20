<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Repositories\LopHocRepository;
use \App\Repositories\KhoiRepository;
use \App\Repositories\GiaoVienRepository;
use App\Repositories\NamHocRepository;
use Carbon\Carbon;

class ThongKeFeedBackController extends Controller
{   
    protected $LopHocRepository;
    protected $KhoiRepository;
    protected $GiaoVienRepository;
    protected $NamHocRepository;

    public function __construct(
        
        LopHocRepository $LopHocRepository,
        KhoiRepository $KhoiRepository,
        GiaoVienRepository $GiaoVienRepository,
        NamHocRepository $NamHocRepository

    ) {
       
       $this->LopHocRepository = $LopHocRepository;
       $this->KhoiRepository = $KhoiRepository;
       $this->GiaoVienRepository = $GiaoVienRepository;
       $this->NamHocRepository = $NamHocRepository;
    }
    public function index()
    {   
        
        $nam_hoc_hien_tai = $this->NamHocRepository->layNamHocHienTai();
        $id = $nam_hoc_hien_tai->id;
        
        $getAllNamHoc = $this->NamHocRepository->getAllNamHoc();
        $khoi = $this->KhoiRepository->getAll();
        $giao_vien = $this->GiaoVienRepository->getGIaoVienChuaCoLop();
        $namhoc = $this->NamHocRepository->find($id);
        $id_nam_hoc = $id;
        return view('quan-ly-feed-back.index', compact('khoi', 'giao_vien', 'namhoc', 'id_nam_hoc', 'getAllNamHoc'));
    }
}
