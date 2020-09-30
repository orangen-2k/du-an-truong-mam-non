<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\KhoiRepository;
use App\Repositories\GiaoVienRepository;
use App\Repositories\LopRepository;
use App\Repositories\HocSinhRepository;
use App\Http\Requests\Lop\Store;
use App\Http\Requests\Lop\Update;

class LopController extends Controller
{
    protected $KhoiRepository;
    protected $GiaoVienRepository;
    protected $LopRepository;
    protected $HocSinhRepository;


    public function __construct(
        LopRepository $LopRepository,
        GiaoVienRepository $GiaoVienRepository,
        KhoiRepository $KhoiRepository,
        HocSinhRepository $HocSinhRepository
    ) {
        $this->LopRepository = $LopRepository;
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->KhoiRepository = $KhoiRepository;
        $this->HocSinhRepository = $HocSinhRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params =  request()->all();
        $queryData['keyword'] = isset($params['keyword']) ? $params['keyword'] : null;
        $queryData['limit'] = isset($params['page_size']) ? $params['page_size'] : 10;
        $queryData['khoi'] = isset($params['khoi']) ? $params['khoi'] : null;
        $khoi = $this->KhoiRepository->getAll();
        $lop = $this->LopRepository->getAllPhanTrang($queryData);
        return view('quan-ly-lop.index', [
            'khoi' => $khoi,
            'lop' => $lop,
            'params' => $params,
            'limit' => $queryData['limit']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khoi = $this->KhoiRepository->getAll();
        $giao_vien = $this->GiaoVienRepository->getGIaoVienChuaCoLop();
        return view('quan-ly-lop.create', [
            'khoi' => $khoi,
            'giao_vien' => $giao_vien
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $data = [
            "khoi_id" => $request->khoi_id,
            "ten_lop" => $request->ten_lop,
        ];
        $idLop = $this->LopRepository->addLop($data);
        if ($request->giao_vien_cn != null) {
            $giao_vien_cn = $request->giao_vien_cn;
            $this->GiaoVienRepository->phanLopGiaoVienCn($giao_vien_cn, $idLop->id);
        }
        if (isset($request->giao_vien_phu)) {
            foreach ($request->giao_vien_phu as $key => $value) {
                $this->GiaoVienRepository->phanLopGiaoVienPhu($value, $idLop->id);
            }
        }
        return $idLop;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $params = request()->all();
        $queryData['gioi_tinh'] = isset($params['gioi_tinh']) ? $params['gioi_tinh'] : null;
        $lop = $this->LopRepository->find($id);
        $giao_vien = $this->GiaoVienRepository->getGiaoVienCuaLop($id);
        $hoc_sinh = $this->HocSinhRepository->getHocSinhCuaLop($id,$queryData);
        return view(
            'quan-ly-lop.show',
            [
                'giao_vien' => $giao_vien,
                'hoc_sinh' => $hoc_sinh,
                'lop' => $lop
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   $id = $request->id;
        $lop = $this->LopRepository->find($id);

        $khoi = $this->KhoiRepository->getAllKhoi();
        $giao_vien = $this->GiaoVienRepository->getGIaoVienChuaCoLop();
        $giao_vien_phu = $lop->giao_vien_phu;
        $giao_vien_cn = $lop->giao_vien_chu_nhiem;

        // return view('quan-ly-lop.edit', [
        //     'khoi' => $khoi,
        //     'giao_vien' => $giao_vien,
        //     'lop' => $lop
        // ]);
        return [
            'giao_vien' => $giao_vien,
            'lop' => $lop,
            'giao_vien_phu' => $giao_vien_phu,
            'giao_vien_cn' => $giao_vien_cn,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request)
    {
        $id = $request->lop_id;
        $lop = $this->LopRepository->find($id);
        $this->LopRepository->update($id, $request->all());
        foreach ($lop->GiaoVien as $key => $value) {
            $this->GiaoVienRepository->removeLopGiaoVien($value->id);
        }
        if ($request->giao_vien_cn != null) {
            $giao_vien_cn = $request->giao_vien_cn;
            $this->GiaoVienRepository->phanLopGiaoVienCn($giao_vien_cn, $lop->id);
        }
        if (isset($request->giao_vien_phu)) {
            foreach ($request->giao_vien_phu as $key => $value) {
                $this->GiaoVienRepository->phanLopGiaoVienPhu($value, $lop->id);
            }
        }
        return 'thành công';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $lop_id = $request->id;
        $this->GiaoVienRepository->xoaLopGiaoVien($lop_id);
        $this->HocSinhRepository->xoaLopHocSinh($lop_id);
        $this->LopRepository->delete($lop_id);
        return redirect()->route('quan-ly-lop-index')->with('status', 'Xóa dữ liệu thành công');
    }

    public function phanLop()
    {
        $hoc_sinh = $this->HocSinhRepository->getHocSinh();
        // dd($hoc_sinh);
        return view('quan-ly-lop.phan-lop',
        ['hoc_sinh' => $hoc_sinh]
    );
    }
    public function xepLop()
    {
        $hoc_sinh = $this->HocSinhRepository->getHocSinh();
        // dd($hoc_sinh);
        return view('quan-ly-lop.xep-lop',
        ['hoc_sinh' => $hoc_sinh]
    );
    }

    public function showHsTheoLop(Request $request)
    {
        $id = $request->id;
        $lop = $this->LopRepository->find($id);
        return $lop->HocSinh;
    }
}
