<?php

namespace App\Http\Controllers;
use App\Repositories\KhoiRepository;
use Illuminate\Http\Request;
use App\Repositories\GiaoVienRepository;
use App\Repositories\LopRepository;
use App\Repositories\HocSinhRepository;

class KhoiController extends Controller
{
    protected $Khoi;
    protected $LopRepository;
    protected $HocSinhRepository;
    protected $GiaoVienRepository;
    public function __construct(
        LopRepository $LopRepository,
        GiaoVienRepository $GiaoVienRepository,
        KhoiRepository $KhoiRepository,
        HocSinhRepository $HocSinhRepository
        
    ){
        $this->LopRepository = $LopRepository;
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->KhoiRepository = $KhoiRepository;
        $this->HocSinhRepository = $HocSinhRepository;
    }
    public function index()
    {   
        $khoi = $this->KhoiRepository->getAllKhoi();
        
        // dd($khoi);
        foreach($khoi as $key => $item){
            $count = 0;
            $lop = $this->KhoiRepository->LopHoc($item->id);
           foreach($lop as $item2){
            $hoc_sinh = $this->KhoiRepository->HocSinh($item2->id);
            $count+=count($hoc_sinh);
           }
            $khoi[$key]->tong_lop_hoc = count($lop);
            $khoi[$key]->tong_hoc_sinh = $count;
            
        }
        //dd($khoi);
        return view('quan-ly-khoi.index', compact('khoi', 'lop'));
    }

    public function post_create(Request $request)
    {
        $request = $request->all();
        return $this->KhoiRepository->post_create($request);
    }

    public function destroy(Request $request)
    {   
        $id = $request->id;
        $this->KhoiRepository->delete($id);
    }

    public function store($id, Request $request)
    {
        $arr = $request->all();
        $this->KhoiRepository->store($arr, $id);
        return redirect()->route('quan-ly-khoi-index')->with('thong_bao', 'Hoàn thành');
    }

    public function show(Request $request)
    {
        $id = $request->id;
        return $this->KhoiRepository->find($id);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $id = $request->id;
        return $this->KhoiRepository->update($id,$data);
    }



}
