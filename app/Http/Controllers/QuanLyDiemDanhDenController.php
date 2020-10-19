<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DiemDanhDenRepository;
use \App\Repositories\LopHocRepository;
use \App\Repositories\KhoiRepository;
use \App\Repositories\GiaoVienRepository;
use App\Repositories\NamHocRepository;
use Carbon\Carbon;

class QuanLyDiemDanhDenController extends Controller
{
    protected $DiemDanhDenRepository;

    public function __construct(
        DiemDanhDenRepository $DiemDanhDenRepository,
        LopHocRepository $LopHocRepository,
        KhoiRepository $KhoiRepository,
        GiaoVienRepository $GiaoVienRepository,
        NamHocRepository $NamHocRepository

    ) {
       $this->DiemDanhDenRepository = $DiemDanhDenRepository;
       $this->LopHocRepository = $LopHocRepository;
       $this->KhoiRepository = $KhoiRepository;
       $this->GiaoVienRepository = $GiaoVienRepository;
       $this->NamHocRepository = $NamHocRepository;
    }

    public function index($id)
    {   
        if ($id == 0) {
            $nam_hoc_hien_tai = $this->NamHocRepository->layNamHocHienTai();
            $id = $nam_hoc_hien_tai->id;
        }
        $getAllNamHoc = $this->NamHocRepository->getAllNamHoc();
        $khoi = $this->KhoiRepository->getAll();
        $giao_vien = $this->GiaoVienRepository->getGIaoVienChuaCoLop();
        $namhoc = $this->NamHocRepository->find($id);
        $id_nam_hoc = $id;
        return view('quan-ly-diem-danh-den.index', compact('khoi', 'giao_vien', 'namhoc', 'id_nam_hoc', 'getAllNamHoc'));
    }
    public function getDiemDanhDen(Request $request)
    {
        $request = $request->all();
        $id = $request['id'];
        $time = $request['time'];
       
        if($time == 0){
            $TimeNow = Carbon::now();
            $time =  $TimeNow->month;
          
        }
        
        $hocsinh = $this->DiemDanhDenRepository->getHocSinhTheoLop($id);
        foreach($hocsinh as $key => $item){
            $N = $S = $C = $NH = $A = 0;
            $NgayDiemDanh = $this->DiemDanhDenRepository->getNgayDiemDanhTheoThang($id, $time, $item->id);
            // foreach($data as $key2 => $item2){
            //     $day = new Carbon($item2->ngay_diem_danh_den);
            //     $hocsinh[$key]->diemdanh[$day->day][$key2] = $item2;
            // }
            $array_diemdanh = [];
            foreach($NgayDiemDanh as $item2){
                $diemdanh = $this->DiemDanhDenRepository->getDiemDanh($id,$item2->ngay_diem_danh_den, $item->id);
                $trang_thai = "";
                $an_com = "";
                
                
                if($diemdanh){
                    //Điểm danh 1 buổi 
                    if(count($diemdanh) == 1){
                        switch ($diemdanh[0]->type) {
                            //Sáng
                            case 1:
                                if ($diemdanh[0]->trang_thai == 1) {
                                    $trang_thai = "S";
                                    $S++;
                                }
                                if($diemdanh[0]->trang_thai == 1 && $diemdanh[0]->phieu_an == 1){
                                    $an_com = "A";
                                    $A++;
                                }
                                if($diemdanh[0]->trang_thai !== 1)
                                {
                                    $trang_thai = "NH";
                                    $NH++;
                                }
                                break;

                            //Chiều
                            case 2:
                                if ($diemdanh[0]->trang_thai == 1) {
                                    $trang_thai = "C";
                                    $C++;
                                }
                                else{
                                    $trang_thai = "NH";
                                    $NH++;
                                }
                                break;
                            
                        }
                    }
                    //Điểm danh đủ buổi 
                    if(count($diemdanh) == 2){
                        switch ($diemdanh[0]->type) {
                            case 1:
                                if ($diemdanh[0]->trang_thai == 1 && $diemdanh[1]->trang_thai == 1) {
                                    $trang_thai = "N";
                                    $N++;
                                }
                                
                                if($diemdanh[0]->trang_thai == 1 && ($diemdanh[1]->trang_thai == 2 || $diemdanh[1]->trang_thai == 3)){
                                    $trang_thai = "S";
                                    $S++;
                                }
                                if($diemdanh[0]->phieu_an == 1){
                                    $an_com = "A";
                                    $A++;
                                }
                                if($diemdanh[1]->trang_thai == 1 && ($diemdanh[0]->trang_thai == 2 || $diemdanh[0]->trang_thai == 3)){
                                    $trang_thai = "C";
                                    $C++;
                                }
                                if($diemdanh[0]->trang_thai !== 1 && $diemdanh[1]->trang_thai !== 1){
                                    $trang_thai = "NH";
                                    $NH++;
                                }
                                break;
                            
                            case 2:
                                if ($diemdanh[1]->trang_thai == 1 && $diemdanh[0]->trang_thai == 1) {
                                    $trang_thai = "N";
                                    $N++;
                                }
                                if($diemdanh[1]->trang_thai == 1 && ($diemdanh[0]->trang_thai == 2 || $diemdanh[0]->trang_thai == 3)){
                                    $trang_thai = "S";
                                    $S++;
                                }
                                if($diemdanh[1]->phieu_an == 1){
                                    $an_com = "A";
                                    $A++;
                                }
                                if($diemdanh[0]->trang_thai == 1 && ($diemdanh[1]->trang_thai == 2 || $diemdanh[1]->trang_thai == 3)){
                                    $trang_thai = "C";
                                    $C++;
                                }
                                if($diemdanh[1]->trang_thai !== 1 && $diemdanh[0]->trang_thai !== 1){
                                    $trang_thai = "NH";
                                    $NH++;
                                }
                                break;
                        }
                    }
                    
                    $array = 
                    [
                        'trang_thai_diem_danh' => $trang_thai,
                        'an_com' => $an_com,
                        'ngay_diem_danh_den' => $diemdanh[0]->ngay_diem_danh_den
                    ];
                    $day = new Carbon($diemdanh[0]->ngay_diem_danh_den);
                    $array_diemdanh[$day->day] = $array;
                }
               
            }
            $hocsinh[$key]->trang_thai_diem_danh = $array_diemdanh;
            $hocsinh[$key]->sang = $S;
            $hocsinh[$key]->chieu = $C;
            $hocsinh[$key]->ca_ngay = $N;
            $hocsinh[$key]->nghi_hoc = $NH;
            $hocsinh[$key]->an_com = $A;
        }
        return [
            'thang_hien_tai' => $time,
            'hocsinh' => $hocsinh
        ];
        
        
    }
    
    public function ThongKeDiemDanh(Request $request){
        $request = $request->all();
        $lop_id = $request['lop_id'];
        $thang = $request['thang'];
        $hoc_sinh_id = $request['hoc_sinh_id'];
        $NgayDiemDanh = $this->DiemDanhDenRepository->getNgayDiemDanhTheoThang($lop_id, $thang, $hoc_sinh_id);
        foreach($NgayDiemDanh as $item){
            $data_diemdanh = $this->DiemDanhDenRepository->getDataDiemDanh($item->ngay_diem_danh_den, $hoc_sinh_id, $lop_id);
            dd($data_diemdanh);
        }
    }
}
