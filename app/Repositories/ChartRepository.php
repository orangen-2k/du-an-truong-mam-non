<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Models\HocSinh;
use Illuminate\Http\Request;

use Carbon\Carbon;
//use GuzzleHttp\Psr7\Request;

class ChartRepository extends BaseRepository
{
    protected $model;
    public function __construct(
        HocSinh $model
    ) {
        parent::__construct();
        $this->model = $model;
    }
    public function getTable(){
        return 'hoc_sinh';
    }
    public function getModel()
    {
        return HocSinh::class;
    }
    

    public function getTongSoLuongHocsinh(){
        $nam = 0;
        $nu = 1;
    //     $data_so_luong_hs= [];

    //   for ($i=0;$i<=12;$i++){
    //          $query['nam'] = $this->model
    //          ->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=',$i)->count();
    //          $query['nu'] = $this->model
    //          ->where('gioi_tinh','like', $nu .'%' )->whereMonth('ngay_vao_truong' ,'=',$i)->count();
          
    //          array_push($data_so_luong_hs,$query);
    // }
//dd($data_so_luong_hs);
$query['nam1'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','1')->count();
$query['nam2'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','2')->count();
$query['nam3'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','3')->count();
$query['nam4'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','4')->count();
$query['nam5'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','5')->count();
$query['nam6'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','6')->count();
$query['nam7'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','7')->count();
$query['nam8'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','8')->count();
$query['nam9'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','9')->count();
$query['nam10'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','10')->count();
$query['nam11'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','11')->count();
$query['nam12'] = $this->model
->where('gioi_tinh','like', $nam .'%' )->whereMonth('ngay_vao_truong' ,'=','12')->count();
$query['nu1'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','1')->count();
$query['nu2'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','2')->count();
$query['nu3'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','3')->count();
$query['nu4'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','4')->count();
$query['nu5'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','5')->count();
$query['nu6'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','6')->count();
$query['nu7'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','7')->count();
$query['nu8'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','8')->count();
$query['nu9'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','9')->count();
$query['nu10'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','10')->count();
$query['nu11'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','11')->count();
$query['nu12'] = $this->model
->where('gioi_tinh','like', $nu .'%')->whereMonth('ngay_vao_truong' ,'=','12')->count();


        return $query;
    }
}