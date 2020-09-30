<?php

namespace App\Http\Controllers;

use App\Repositories\GiaoVienRepository;
use App\Repositories\HocSinhRepository;
use App\Repositories\ThongBaoRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ThongBaoController extends Controller
{
    protected $GiaoVienRepository;
    protected $HocSinhRepository;
    protected $ThongBaoRepository;

    public function __construct(
        GiaoVienRepository $GiaoVienRepository,
        HocSinhRepository $HocSinhRepository,
        ThongBaoRepository $ThongBaoRepository

    ) {
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->HocSinhRepository = $HocSinhRepository;
        $this->ThongBaoRepository = $ThongBaoRepository;
    }

    public function uiThongBaoGiaoVien()
    {
        $data = $this->GiaoVienRepository->getAll();
        return view('thong-bao.giaovien', compact('data'));
    }
    public function uiThongBaoHocSinh()
    {
        $data = $this->HocSinhRepository->getAll();
        dd($data);
        return view('thong-bao.hocsinh', compact('data'));
    }

    public function store(Request $request)
    {
        $data = [];
        foreach ($request->user_id as $key) {
            $dataInput = [
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $key,
                'auth_id' => Auth::id(),
            ];
            $this->ThongBaoRepository->create($dataInput);
            $object = (object) $dataInput;
            array_push($data, $object);

        };
        return response()->json([
            'data' => $data,
            'code' => 200,
        ], 200);
    }

}
