<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Repositories\TinhThanhPhoRepository;
use \App\Repositories\QuanHuyenRepository;
use \App\Repositories\XaPhuongThiTranRepository;
use \App\Repositories\DangKiNhapHocRepository;
use \App\Repositories\HocSinhRepository;
use \App\Repositories\DoiTuongChinhSachRepository;
use App\Http\Requests\DangKiNhapHoc\CreateNhapHoc;
use App\Http\Requests\DangKiNhapHoc\EditNhapHoc;
use Storage;
class QuanLyDangKyNhapHocController extends Controller
{
    protected $TinhThanhPho;
    protected $QuanHuyen;
    protected $XaPhuongThiTran;
    protected $DangKiNhapHoc;
    protected $HocSinh;
    protected $DoiTuongChinhSach;
    public function __construct(
        TinhThanhPhoRepository $TinhThanhPho,
        DangKiNhapHocRepository $DangKiNhapHoc,
        QuanHuyenRepository $QuanHuyen,
        XaPhuongThiTranRepository $XaPhuongThiTran,
        HocSinhRepository $HocSinh,
        DoiTuongChinhSachRepository $DoiTuongChinhSach
    ){
        $this->TinhThanhPho = $TinhThanhPho;
        $this->QuanHuyen = $QuanHuyen;
        $this->XaPhuongThiTran = $XaPhuongThiTran;
        $this->DangKiNhapHoc = $DangKiNhapHoc;
        $this->HocSinh = $HocSinh;
        $this->DoiTuongChinhSach = $DoiTuongChinhSach;
    }

    public function index(Request $request){
        $params = request()->all();
        $all_hs_dang_ki = $this->DangKiNhapHoc->getAllHocSinhDangKy($params);
        return view('quan-ly-dang-ki-nhap-hoc.index',compact('all_hs_dang_ki'));
    }

    public function show($id){
        $hs_dk=  $this->DangKiNhapHoc->getOneHocSinhDangKy($id);
        $ho_khau_qh = $this->QuanHuyen->getOneQuanHuyen($hs_dk->ho_khau_thuong_tru_maqh);  
        $noi_o_qh = $this->QuanHuyen->getOneQuanHuyen($hs_dk->noi_o_hien_tai_maqh);  
        $ho_khau_xaid = $this->XaPhuongThiTran->getOneXaPhuong($hs_dk->ho_khau_thuong_tru_xaid);  
        $noi_o_xaid = $this->XaPhuongThiTran->getOneXaPhuong($hs_dk->noi_o_hien_tai_xaid);  
        $tp = $this->TinhThanhPho->getAllThanhPho();  
        $doi_tuong_chinh_sach = $this->DoiTuongChinhSach->getAllDoiTuongChinhSach();  
        return view('quan-ly-dang-ki-nhap-hoc.edit',compact('hs_dk','tp','ho_khau_qh','ho_khau_xaid','noi_o_qh','noi_o_xaid','doi_tuong_chinh_sach'));
    }


    public function edit(Request $request){
        $status = $request->status;
        $id = $request->id_hs_dk;
        return $this->DangKiNhapHoc->updateHocSinhDangKy($id,['status'=>$status]);
    }

    public function PheDuyet(EditNhapHoc $request){
        $data = $request->all();
        $id =  $data['id_hs_dk'];
        $avatar =$request->file("avatar");
        $date_ngay_sinh = $request->ngay_sinh;  
        $data['ngay_sinh'] = date("Y-m-d", strtotime($date_ngay_sinh));  

        if($avatar != null){
            $pathLoad = Storage::putFile(
                'public/uploads/avatar',
                $avatar
            );
            $path = str_replace("/","\\",$pathLoad);
            $data['avatar']=$path;
        }

        unset($data['_token']);
        unset($data['id_hs_dk']);
        return $this->DangKiNhapHoc->updateHocSinhDangKy($id,$data);
    }
  
}
