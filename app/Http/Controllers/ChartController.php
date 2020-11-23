<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ChartRepository; 
use HocSinh;

class ChartController extends Controller
{
    protected $ChartRepository;
    public function __construct(
        ChartRepository $ChartRepository
    ) {
        $this->ChartRepository = $ChartRepository;
       
    }
    public function getAllHocSinh()
    {
       // $hoc_sinh=HocSinh::all();
        $data=$this->ChartRepository->getTongSoLuongHocsinh();
        return view('index',compact('data'));
    }  
}
