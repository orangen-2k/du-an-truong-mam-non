<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Repositories\SucKhoeRepository;
use \App\Repositories\LopHocRepository;
use \App\Repositories\KhoiRepository;
use \App\Repositories\GiaoVienRepository;
use App\Repositories\NamHocRepository;
use Carbon\Carbon;

class QuanlySucKhoeController extends Controller
{
    protected $SucKhoeRepository;
    public function __construct(
        SucKhoeRepository $SucKhoeRepository,
        LopHocRepository $LopHocRepository,
        KhoiRepository $KhoiRepository,
        GiaoVienRepository $GiaoVienRepository,
        NamHocRepository $NamHocRepository

    ) {
       $this->SucKhoeRepository = $SucKhoeRepository;
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
        $dot_id_gan_nhat = 0;
        $getAllNamHoc = $this->NamHocRepository->getAllNamHoc();
        $khoi = $this->KhoiRepository->getAll();
        $namhoc = $this->NamHocRepository->find($id);
        $id_nam_hoc = $id;
        $EndDateNamHoc = $this->NamHocRepository->getEndDateNamHoc($id_nam_hoc);
        $thoi_gian_gan_nhat = $this->SucKhoeRepository->getDotMoiNhatTheoNam($EndDateNamHoc->end_date);
        if($thoi_gian_gan_nhat !== null){
            $dot_id_gan_nhat = $thoi_gian_gan_nhat->id;
        }
        
        $getAllDotKhamSucKhoe = $this->SucKhoeRepository->getAllDotKhamSucKhoe($EndDateNamHoc->end_date, $EndDateNamHoc->start_date);
        // dd(count($getAllDotKhamSucKhoe));
        return view('quan-ly-suc-khoe.index', compact(
            'khoi',
            'namhoc', 
            'id_nam_hoc', 
            'getAllNamHoc', 
            'dot_id_gan_nhat',
            'getAllDotKhamSucKhoe'
        ));
    }

    public function showQuanLySucKhoe(Request $request){
        $request = $request->all();
        $lop_id = $request['lop_id'];
        $dot_id_gan_nhat = $request['dot_id_gan_nhat'];
        $getSucKhoHocSinhTheoLop = $this->SucKhoeRepository->getSucKhoeHocSinhTheoLop($lop_id, $dot_id_gan_nhat);
        return $getSucKhoHocSinhTheoLop;
        
    }

    public function themDotKhamSucKhoe(Request $request){
        $request = $request->all();
        unset($request['_token']);
        $ten_dot = $request['ten_dot'];
        $thoi_gian = $request['thoi_gian'];
        $array = [
            'ten_dot' => $ten_dot,
            'thoi_gian' => $thoi_gian
        ];
        $this->SucKhoeRepository->postThemDotKhamSucKhoe($array);
        return redirect()->route('quan-ly-suc-khoe-index', ['id' => 0])->with('ThongBaoThemDot', 'Hoàn Thành');
    } 
    
    public function showChiTietSucKhoe(Request $request){
        $request = $request->all();
        $hoc_sinh_id = $request['hoc_sinh_id'];
        $data = $this->SucKhoeRepository->getChiTietSucKhoe($hoc_sinh_id);
        return $data;
    }
}
