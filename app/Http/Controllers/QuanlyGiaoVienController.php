<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\GiaoVienRepository;
use App\Repositories\KhoiRepository;
use App\Repositories\LopHocRepository;
use App\Repositories\QuanHuyenRepository;
use App\Repositories\TinhThanhPhoRepository;
use App\Repositories\XaPhuongThiTranRepository;
use App\Http\Requests\ValidateCreateQuanLiGV;
use App\Repositories\AccountRepository;
use Storage;
use App\Http\Requests\GiaoVien\StoreGiaoVien;
use App\Repositories\NamHocRepository;

class QuanlyGiaoVienController extends Controller
{
    protected $KhoiRepository;
    protected $GiaoVienRepository;
    protected $LopHocRepository;
    protected $TinhThanhPhoRepository;
    protected $QuanHuyenRepository;
    protected $XaPhuongThiTranRepository;
    protected $AccountRepository;
    protected $NamHocRepository;

    public function __construct(
        GiaoVienRepository $GiaoVienRepository,
        KhoiRepository $KhoiRepository,
        LopHocRepository $LopHocRepository,
        TinhThanhPhoRepository $TinhThanhPhoRepository,
        QuanHuyenRepository $QuanHuyenRepository,
        XaPhuongThiTranRepository $XaPhuongThiTranRepository,
        AccountRepository $AccountRepository,
        NamHocRepository $NamHocRepository
    ) {
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->KhoiRepository = $KhoiRepository;
        $this->LopHocRepository = $LopHocRepository;
        $this->TinhThanhPhoRepository = $TinhThanhPhoRepository;
        $this->QuanHuyenRepository = $QuanHuyenRepository;
        $this->XaPhuongThiTranRepository = $XaPhuongThiTranRepository;
        $this->AccountRepository = $AccountRepository;
        $this->NamHocRepository = $NamHocRepository;
    }
    public function index()
    {

        $params = request()->all();
        if (isset(request()->page_size)) {
            $limit = request()->page_size;
        } else {
            $limit = 20;
        }
        $data = $this->GiaoVienRepository->getAllGV_limit($params, $limit);
        $khoi = $this->KhoiRepository->getAll();
        $lop = $this->LopHocRepository->getAll();
        foreach ($data as $key => $item) {
            $data2 = $this->GiaoVienRepository->getLopHoc($item->lop_id);

            if (isset($data2)) {
                $data[$key]->ten_lop = $data2->ten_lop;
                $data[$key]->ten_khoi = $data2->ten_khoi;
            } else {
                $data[$key]->ten_lop = "";
                $data[$key]->ten_khoi = "";
            }
        }
        return view('quan-ly-giao-vien.index', compact('data', 'khoi', 'lop', 'limit'));
    }

    public function create()
    {
        $khoi = $this->KhoiRepository->getAll();
        $lop = $this->LopHocRepository->getAll();
        $thanhpho = $this->TinhThanhPhoRepository->getAllThanhPho();
        return view('quan-ly-giao-vien.create', compact('khoi', 'lop', 'thanhpho'));
    }
    public function store(StoreGiaoVien $request)
    {
        $request['role'] = 2;
        $request['name'] = $request['ten'];
        $user = $this->AccountRepository->storeAcount($request->all());
        $anh = $request->file("anh");
        $dataRequest = $request->all();
        $dataRequest['user_id'] = $user->id;
        unset($dataRequest['role']);
        unset($dataRequest['name']);
        if ($anh) {
            $pathLoad = Storage::putFile(
                'public/uploads/anh_gv',
                $anh
            );
            $path = str_replace("/", "\\", $pathLoad);
            $path = trim($path, 'public/');
            $dataRequest['anh'] = $path;
        }
        unset($dataRequest['_token']);
        unset($dataRequest['khoi']);
        $dataRequest['ma_gv'] = 'GV' . time();
        $this->GiaoVienRepository->store_gv($dataRequest);
        return redirect()->route('quan-ly-giao-vien-index')->with('thong_bao', 'Hoàn thành');
    }
    public function getLopTheoKhoi(Request $request)
    {
        $data = [];
        $id = $request->id;
        if ($id == 0) {
            $data = $this->LopHocRepository->getAll();
        } else {
            $data = $this->LopHocRepository->getLopHocOfKhoi($id);
        }

        return $data;
    }
    public function edit($lop_id, $id)
    {
        $data = $this->GiaoVienRepository->getGV($id, $lop_id);
        $khoi = $this->KhoiRepository->getAll();
        $lop = $this->LopHocRepository->getAll();
        $thanhpho = $this->TinhThanhPhoRepository->getAllThanhPho();
        $maqh_gv_hktt = $this->QuanHuyenRepository->getQuanHuyenByMaTp($data->ho_khau_thuong_tru_matp);
        $xaid_gv_hktt = $this->XaPhuongThiTranRepository->getXaPhuongThiTranByMaPh($data->ho_khau_thuong_tru_maqh);
        $maqh_gv_noht = $this->QuanHuyenRepository->getQuanHuyenByMaTp($data->noi_o_hien_tai_matp);
        $xaid_gv_noht = $this->XaPhuongThiTranRepository->getXaPhuongThiTranByMaPh($data->noi_o_hien_tai_maqh);
        //dd($xaid_gv_hktt);
        return view('quan-ly-giao-vien.edit', compact(
            'data',
            'khoi',
            'lop',
            'thanhpho',
            'maqh_gv_hktt',
            'xaid_gv_hktt',
            'maqh_gv_noht',
            'xaid_gv_noht'
        ));
    }
    public function update(ValidateCreateQuanLiGV $request, $id)
    {
        $dataRequest = $request->all();
        if (isset($dataRequest['anh'])) {
            $anh = $request->file("anh");
            // dd($a)
            if ($anh) {
                // $pathLoad = Storage::putFile(
                //     'public/uploads/anh_gv',
                //     $anh
                // );
                $pathLoad = $anh->store('public/uploads/anh_gv');
                $path =  $pathLoad;
                // dd($path);
                // $path = trim($path, 'public/');
                $dataRequest['anh'] = $path;
                // dd($dataRequest['anh']);
            }
        }
        unset($dataRequest['_token']);
        unset($dataRequest['khoi']);
        $this->GiaoVienRepository->update_gv($id, $dataRequest);
        return redirect()->route('quan-ly-giao-vien-index')->with('thong_bao', 'Hoàn thành');
    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        $this->GiaoVienRepository->destroy_gv($data['id']);
        return redirect()->route('quan-ly-giao-vien-index')->with('thong_bao', 'Hoàn thành');
    }

    public function getGiaoVienChuaCoLop()
    {
        return $this->GiaoVienRepository->getGIaoVienChuaCoLop();
    }

    public function phanLopChoGiaoVien(Request $request)
    {
        $id_nam_hien_tai = $this->NamHocRepository->maxID();
        if ($request->session()->has('id_nam_hoc')) {
            $id = $request->session()->get('id_nam_hoc');
        } else {
            $id = $this->NamHocRepository->maxID();
        }
        // dd($id);
        $nam_hoc_moi = $this->NamHocRepository->find($id);
        $khoi = $nam_hoc_moi->Khoi;

        // dd($khoi);

        $lop = [];
        foreach ($khoi as $key => $value) {
            array_push($lop, $value->LopHoc);
        }
        // dd($lop);
        $collection = collect($lop);
        $data_lop = $collection->collapse();
        $data_lop->all();
        if ($request->session()->has('id_nam_hoc') && $request->session()->get('id_nam_hoc') != $id_nam_hien_tai) {
            $giao_vien = [];
            foreach ($data_lop as $key => $value) {
                array_push($giao_vien, $value->LichSuDay);
            }
            $collection = collect($giao_vien);
            $data_giao_vien = $collection->collapse();
            $data_giao_vien->all();
            $data_giao_vien->map(function ($giaovien) {
                $giaovien->ten = $giaovien->GiaoVien->ten;
                $giaovien->ma_gv = $giaovien->GiaoVien->ma_gv;
                return $giaovien;
            });
        } else {
            $data_giao_vien = $this->GiaoVienRepository->getAllGvTheoUser();
        }
        // dd($data_lop,$data_giao_vien);
        return view('quan-ly-giao-vien.phan_lop', compact('data_lop', 'data_giao_vien','id_nam_hien_tai'));
    }

    public function storePhanLopChoGiaoVien(Request $request)
    {
        $data_phan_lop = $request->all();
        foreach ($data_phan_lop as $key => $value) {
            $this->GiaoVienRepository->update($value['id'], ['lop_id' => $value['lop_id'], 'type' => $value['type']]);
        }
        return 'thành công';
    }
}
