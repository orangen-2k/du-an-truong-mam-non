<?php

namespace App\Http\Controllers;
use App\Repositories\KhoiRepository;
use Illuminate\Http\Request;

class KhoiController extends Controller
{
    protected $LopHoc;
    protected $Khoi;
    public function __construct(
        KhoiRepository $Khoi
        
    ){
        $this->Khoi = $Khoi;
    }
    public function index()
    {   
        $khoi = $this->Khoi->getAll();
        
        // dd($khoi);
        foreach($khoi as $key => $item){
            $count = 0;
            $lop = $this->Khoi->LopHoc($item->id);
           foreach($lop as $item2){
            $hoc_sinh = $this->Khoi->HocSinh($item2->id);
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
        $this->Khoi->post_create($request);
        return redirect()->route('quan-ly-khoi-index')->with('thong_bao', 'Hoàn thành');
    }

    public function destroy(Request $request)
    {   
        $request = $request->all();
        $this->Khoi->destroy($request['id']);
        return redirect()->route('quan-ly-khoi-index')->with('thong_bao', 'Hoàn thành');
    }

    public function store($id, Request $request)
    {
        $arr = $request->all();
        $this->Khoi->store($arr, $id);
        return redirect()->route('quan-ly-khoi-index')->with('thong_bao', 'Hoàn thành');
    }



}
