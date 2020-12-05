<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LopRepository;
use App\Repositories\HocSinhRepository;
use App\Repositories\NamHocRepository;
use App\Repositories\GiaoVienRepository;
use App\Repositories\KhoiRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{   
    protected $GiaoVienRepository;
    protected $LopRepository;
    protected $HocSinhRepository;
    protected $NamHocRepository;
    protected $KhoiRepository;

    public function __construct(
        LopRepository $LopRepository,
        GiaoVienRepository $GiaoVienRepository,
        KhoiRepository $KhoiRepository,
        HocSinhRepository $HocSinhRepository,
        NamHocRepository $NamHocRepository
    ) {
        $this->LopRepository = $LopRepository;
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->KhoiRepository = $KhoiRepository;
        $this->HocSinhRepository = $HocSinhRepository;
        $this->NamHocRepository = $NamHocRepository;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        
        $id = $this->NamHocRepository->maxID();
        $array_nam = [];
        $array_nu = [];
        $array_thang = [];
        for($i = 1; $i < 14; $i++){
            array_push($array_nam, 0);
            array_push($array_nu, 0);
        }
        for($j = 1; $j < 13; $j++){
            array_push($array_thang, 'Tháng '.($j));
        }
        if($id){
            $namhoc = $this->NamHocRepository->find($id);
            $hoc_sinh_theo_ngay_vao_truong = $this->HocSinhRepository->getHocSinhTheoNgayVaoTruong($namhoc->start_date, $namhoc->end_date);
            
            if($hoc_sinh_theo_ngay_vao_truong){
                foreach($hoc_sinh_theo_ngay_vao_truong as $item){
                    $newDate = new Carbon($item->ngay_vao_truong);
                    if($item->gioi_tinh == 1){
                        $array_nam[$newDate->month] = $array_nam[$newDate->month]+1;
                    }
                    if($item->gioi_tinh == 0){
                        $array_nu[$newDate->month] = $array_nu[$newDate->month]+1;
                    }
                }
                
            }
        }
        return view('index', compact('array_nam', 'array_nu', 'array_thang', 'namhoc'));
    }
}
