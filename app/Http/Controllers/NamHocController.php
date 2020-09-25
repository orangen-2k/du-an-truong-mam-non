<?php

namespace App\Http\Controllers;

use App\Repositories\NamHocRepository;
use Illuminate\Http\Request;

class NamHocController extends Controller
{
    public $NamHocRepository;
    public function __construct(NamHocRepository $NamHocRepository)
    {
        $this->NamHocRepository = $NamHocRepository;
    }

    public function index(Type $var = null)
    {
        $data = $this->NamHocRepository->getAllNamHoc();
        return view('nam-hoc.index', compact('data'));
    }

    public function store(Request $request)
    {
        unset($request['_token']);
        $validator = $request->validate([
            'name' => 'required|unique:nam_hoc|max:191',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'required' => 'Hãy nhập',
            'name.unique' => ' đã có',
            'start_date.before' => 'nhap nho hon',
            'end_date.after' => 'nhap lon hon',
        ]);
        $data = $this->NamHocRepository->create($request->all());
        if (!$data) {
            return redirect()->route('nam-hoc.index')->withInput()->with(['error' => 'thêm thành công']);
        }
        return redirect()->route('nam-hoc.index')->withInput()->with(['success' => 'thêm thành công']);

    }
}
