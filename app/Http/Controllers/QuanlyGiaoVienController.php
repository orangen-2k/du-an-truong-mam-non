<?php

namespace App\Http\Controllers;
use App\Repositories\GiaoVienRepository;
use App\Repositories\KhoiRepository;
use Illuminate\Http\Request;

class QuanlyGiaoVienController extends Controller
{   
    protected $KhoiRepository;
    protected $GiaoVienRepository;
    public function __construct(
        GiaoVienRepository $GiaoVienRepository,
        KhoiRepository $KhoiRepository
    ){
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->KhoiRepository = $KhoiRepository;
    }
    public function index()
    {   
        $data = $this->GiaoVienRepository->getAll();
        foreach($data as $key => $item)
        {
            $data2 = $this->GiaoVienRepository->getLopHoc($item->lop_id);
           
            if(isset($data2)){
                $data[$key]->ten_lop = $data2->ten_lop;
                $data[$key]->ten_khoi = $data2->ten_khoi;
            }
            else{
                $data[$key]->ten_lop = "";
                $data[$key]->ten_khoi = "";
            }
            
        }
        return view('quan-ly-giao-vien.index', compact('data'));
    }
    
    public function add()
    {   
        $khoi = $this->KhoiRepository->getAll();
        return view('quan-ly-giao-vien.add', compact('khoi'));
    }
}
