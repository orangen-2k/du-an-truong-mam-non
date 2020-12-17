<?php

namespace App\Http\Controllers;

use App\Models\NoiDungThongBao;
use Illuminate\Http\Request;
use App\Repositories\LopRepository;
use App\Repositories\HocSinhRepository;
use App\Repositories\NamHocRepository;
use App\Repositories\GiaoVienRepository;
use App\Repositories\KhoiRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repositories\QuanLyThangThuRepository;
use App\Repositories\QuanLyChiTietDotThuRepository;
use App\Repositories\DanhSachThuTienRepository;
class HomeController extends Controller
{   
    protected $GiaoVienRepository;
    protected $LopRepository;
    protected $HocSinhRepository;
    protected $NamHocRepository;
    protected $KhoiRepository;
    protected $QuanLyThangThuRepository;
    protected $QuanLyChiTietDotThuRepository;
    protected $DanhSachThuTienRepository;

    public function __construct(
        LopRepository $LopRepository,
        GiaoVienRepository $GiaoVienRepository,
        KhoiRepository $KhoiRepository,
        HocSinhRepository $HocSinhRepository,
        NamHocRepository $NamHocRepository,
        QuanLyThangThuRepository $QuanLyThangThuRepository,
        QuanLyChiTietDotThuRepository $QuanLyChiTietDotThuRepository,
        DanhSachThuTienRepository $DanhSachThuTienRepository
    ) {
        $this->LopRepository = $LopRepository;
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->KhoiRepository = $KhoiRepository;
        $this->HocSinhRepository = $HocSinhRepository;
        $this->NamHocRepository = $NamHocRepository;
        $this->QuanLyThangThuRepository = $QuanLyThangThuRepository;
        $this->QuanLyChiTietDotThuRepository = $QuanLyChiTietDotThuRepository;
        $this->DanhSachThuTienRepository = $DanhSachThuTienRepository;
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
        $namhoc = $this->NamHocRepository->find($id);
        $getAllNamHoc = $this->NamHocRepository->getNamHoc();
        $array_nam = [];
        $array_hoc_sinh = [];
        if(count($getAllNamHoc) > 0 ){
            foreach($getAllNamHoc as $namhoc){
                array_push($array_nam, $namhoc->name);
                $hoc_sinh_theo_ngay_vao_truong = $this->HocSinhRepository->getHocSinhTheoNgayVaoTruong($namhoc->start_date, $namhoc->end_date);
                // /dd($hoc_sinh_theo_ngay_vao_truong);
                if(count($hoc_sinh_theo_ngay_vao_truong) > 0){
                    array_push($array_hoc_sinh, count($hoc_sinh_theo_ngay_vao_truong));
                    
                }
                else{
                    array_push($array_hoc_sinh, 0);
                }
            }
        }
        $so_tien_phai_dong = 0;
        $so_tien_da_dong = 0;
        
        $thang_thu_moi_nhat = $this->QuanLyThangThuRepository->getDotMoiNhatCuaNam($id);
        if($thang_thu_moi_nhat){
            $dot_thu_tien = $this->QuanLyChiTietDotThuRepository->getDotThuTheoNamIDThangThu($thang_thu_moi_nhat->id);
            foreach($dot_thu_tien as $item){
               $DsThuTien = $this->DanhSachThuTienRepository->getDanhSachThuTienTheoDot($item->id);
               if(count($DsThuTien) > 0){
                    foreach($DsThuTien as $item2){
                        $so_tien_phai_dong += $item2->so_tien_phai_dong;
                        $so_tien_da_dong += $item2->so_tien_da_dong;
                    }
               }
            }
        }
        $so_tien_con_phai_dong = $so_tien_phai_dong - $so_tien_da_dong;

        //Tin tức
        $user_auth = User::where('role', 1)->get();
        foreach($user_auth as $key => $item3){
            $user_auth[$key] = $item3->id;
        }
        $noi_dung_thong_bao = NoiDungThongBao::whereIn('auth_id', $user_auth->toArray())->orderBy('id', 'desc')->limit(15)->get();
       

        return view('index', compact(
            'array_nam',
            'array_hoc_sinh', 
            'namhoc', 
            'so_tien_con_phai_dong',
            'so_tien_da_dong',
            'so_tien_phai_dong',
            'noi_dung_thong_bao'
        ));
    }
}
