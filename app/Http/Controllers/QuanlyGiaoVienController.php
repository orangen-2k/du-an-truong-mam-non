<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\GiaoVienRepository;
use App\Repositories\KhoiRepository;
use App\Repositories\LopHocRepository;
use App\Repositories\TinhThanhPhoRepository;
use Storage;

class QuanlyGiaoVienController extends Controller
{
    protected $KhoiRepository;
    protected $GiaoVienRepository;
    protected $LopHocRepository;
    protected $TinhThanhPhoRepository;
    public function __construct(
        GiaoVienRepository $GiaoVienRepository,
        KhoiRepository $KhoiRepository,
        LopHocRepository $LopHocRepository,
        TinhThanhPhoRepository $TinhThanhPhoRepository
    ) {
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->KhoiRepository = $KhoiRepository;
        $this->LopHocRepository = $LopHocRepository;
        $this->TinhThanhPhoRepository = $TinhThanhPhoRepository;
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
    public function store(Request $request)
    {   
        $anh = $request->file("anh");
        $dataRequest = $request->all();
    
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
}
