<?php

namespace App\Http\Controllers;

use App\Models\NoiDungThongBao;
use App\Repositories\GiaoVienRepository;
use App\Repositories\NamhocRepository;
use App\Repositories\NoiDungThongBaoRepository;
use App\Repositories\ThongBaoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThongBaoController extends Controller
{
    protected $GiaoVienRepository;
    protected $NamhocRepository;
    protected $ThongBaoRepository;
    protected $NoiDungThongBaoRepository;

    public function __construct(
        GiaoVienRepository $GiaoVienRepository,
        NamhocRepository $NamhocRepository,
        ThongBaoRepository $ThongBaoRepository,
        NoiDungThongBaoRepository $NoiDungThongBaoRepository

    ) {
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->NamhocRepository = $NamhocRepository;
        $this->ThongBaoRepository = $ThongBaoRepository;
        $this->NoiDungThongBaoRepository = $NoiDungThongBaoRepository;
    }

    public function index()
    {
        $data = $this->NoiDungThongBaoRepository->getAll();
        return view('thong-bao.index', compact('data'));
    }

    public function showThongBao($id)
    {
        $data = $this->NoiDungThongBaoRepository->findById($id);
        if ($data) {
            return view('thong-bao.chitiet', compact('data'));
        } else {
            return redirect()->route('thong-bao.index');
        }
    }

    public function uiThongBaoToanTruong()
    {
        return view('thong-bao.toantruong');
    }

    public function uiThongBaoGiaoVien()
    {
        $data = $this->GiaoVienRepository->getAll();
        return view('thong-bao.giaovien', compact('data'));
    }
    public function uiThongBaoHocSinh()
    {
        $data = $this->NamhocRepository->layNamHocHienTai();
        return view('thong-bao.hocsinh', compact('data'));
    }

    public function store(Request $request)
    {
        $user_id = $request->user_id;
        if ($request->isCheck) {
            foreach ($request->lop_id as $val) {
                $data_giao_vien = DB::table('giao_vien')->select('user_id')->where('lop_id', $val)->get();
                if (count($data_giao_vien) > 0) {
                    foreach ($data_giao_vien as $item) {
                        array_push($user_id, $item->user_id);
                    }
                }
            }
        }
        $data = [];
        $thongbao_id = NoiDungThongBao::create([
            'title' => $request->title,
            'content' => $request->content,
            'auth_id' => Auth::id(),
            'type' => $request->type,
        ])->id;

        foreach ($user_id as $key) {
            $dataInput = [
                'thongbao_id' => $thongbao_id,
                'user_id' => $key,
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

    public function postToanTruong(Request $request)
    {
        $user_id = [];
        $users = DB::table('users')
            ->where('active', 1)
            ->whereIn('role', [2, 3])
            ->get();
        foreach ($users as $item) {
            array_push($user_id, $item->id);
        }

        $thongbao_id = NoiDungThongBao::create([
            'title' => $request->title,
            'content' => $request->content,
            'auth_id' => Auth::id(),
            'type' => $request->type,
        ])->id;

        $data = [];
        foreach ($user_id as $key) {
            $dataInput = [
                'thongbao_id' => $thongbao_id,
                'user_id' => $key,
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
