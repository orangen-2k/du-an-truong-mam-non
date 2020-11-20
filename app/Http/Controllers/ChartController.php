<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ChartRepository; 
use HocSinh;
use App\Repositories\KhoiRepository;
use App\Repositories\LopRepository;
use App\Repositories\HocSinhRepository;
use App\Repositories\NamHocRepository;

class ChartController extends Controller
{
    protected $ChartRepository;
    protected $KhoiRepository;
    protected $LopRepository;
    protected $HocSinhRepository;
    protected $NamHocRepository;
    public function __construct(
        ChartRepository $ChartRepository,
        LopRepository $LopRepository,
        KhoiRepository $KhoiRepository,
        HocSinhRepository $HocSinhRepository,
        NamHocRepository $NamHocRepository
    ) {
        $this->ChartRepository = $ChartRepository;
        $this->LopRepository = $LopRepository;
        $this->KhoiRepository = $KhoiRepository;
        $this->HocSinhRepository = $HocSinhRepository;
        $this->NamHocRepository = $NamHocRepository;
       
    }
    public function getAllHocSinh(Request $request)
    {
       // $hoc_sinh=HocSinh::all();
        $data=$this->ChartRepository->getTongSoLuongHocsinh();  

        if($request->session()->has('id_nam_hoc')){
            $id_nam_hien_tai = $request->session()->get('id_nam_hoc');
        }else{
            $id_nam_hien_tai = $this->NamHocRepository->maxID();
        }
        $nam_hoc_share = $this->NamHocRepository->find($id_nam_hien_tai);

        $khoi = $nam_hoc_share->Khoi;
        $sl_hs_type = [];
        $sl_hs_type[0] = $this->HocSinhRepository->getSlHocSinhType(0);
      // dd($khoi);
        return view('index', [
            'sl_hs_type' => $sl_hs_type,
            'nam_hoc_share' => $nam_hoc_share,
            'id_nam_hoc' => $id_nam_hien_tai,
            'khoi' => $khoi,
        ],compact('data'));
    }  
}
