<?php

namespace App\Http\Controllers;

use App\Repositories\NamHocRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NamHocController extends Controller
{
    public $NamHocRepository;
    public function __construct(NamHocRepository $NamHocRepository)
    {
        $this->NamHocRepository = $NamHocRepository;
    }

    public function index()
    {
        $checkNew = $this->NamHocRepository->checkNew();
        $data = $this->NamHocRepository->getAllNamHoc();
        return view('nam-hoc.index', compact('data', 'checkNew'));
    }

    public function store(Request $request)
    {
        unset($request['_token']);
        $validator = $request->validate([
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'required' => 'Hãy nhập thời gian',
            'start_date.before' => 'Thời gian bắt đầu phải nhỏ hơn thời gian kết thúc',
            'end_date.after' => 'Thời gian kết thúc phải lớn hơn thời gian bắt đầu',
        ]);
        $array_input = [
            'name' => Carbon::parse($request->start_date)->year . ' - ' . Carbon::parse($request->end_date)->year,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];
        $data = $this->NamHocRepository->create($array_input);
        $message = !$data ? ['error' => 'Thêm thất bại'] : ['success' => 'Thêm thành công'];
        return redirect()->route('nam-hoc.index')->withInput()->with($message);

    }
    public function chiTietNamHoc()
    {
        return view('nam-hoc.chi_tiet_nam_hoc');
    }
}
