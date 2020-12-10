<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HoatDongRepository;
use App\Repositories\NamHocRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\GiaoVienRepository;
use App\Repositories\NoiDungThongBaoRepository;
use App\Repositories\ThongBaoRepository;



use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class QuanLyGiaoTrinhController extends Controller
{
    protected $HoatDongRepository;
    protected $NamHocRepository;
    protected $GiaoVienRepository;
    protected $NoiDungThongBaoRepository;
    protected $ThongBaoRepository;

    public function __construct(
        HoatDongRepository $HoatDongRepository,
        NamHocRepository $NamHocRepository,
        NotificationRepository $NotificationRepository,
        GiaoVienRepository $GiaoVienRepository,
        NoiDungThongBaoRepository $NoiDungThongBaoRepository,
        ThongBaoRepository $ThongBaoRepository
    )
    {
        $this->HoatDongRepository = $HoatDongRepository;
        $this->NamHocRepository = $NamHocRepository;
        $this->NotificationRepository = $NotificationRepository;
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->NoiDungThongBaoRepository = $NoiDungThongBaoRepository;
        $this->ThongBaoRepository = $ThongBaoRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
       
        $id_nam_hien_tai = $this->NamHocRepository->maxID();
        if ($request->session()->has('id_nam_hoc')) {
            $id_nam_hoc = $request->session()->get('id_nam_hoc');
        } else {
            $id_nam_hoc = $this->NamHocRepository->maxID();
        }
        // dd($id_nam_hoc);
        $nam_hoc_moi = $this->NamHocRepository->find($id_nam_hoc);
        $khoi = $nam_hoc_moi->Khoi;
        // $date = $nam_hoc_moi->start_date;
        $date_start = Carbon::createFromFormat('Y-m-d', $nam_hoc_moi->start_date);
        $end_start = Carbon::createFromFormat('Y-m-d', $nam_hoc_moi->end_date);
        $so_luong_tuan = $date_start->diffInWeeks($end_start);
        $date = Carbon::now(); // or $date = new Carbon()
        if(isset($params['tuan'])){
            $tuan_chon = $params['tuan'];
        }else{
            $tuan_chon = $date->weekOfYear -$date_start->weekOfYear ;

        }
        $tuan_hien_tai = $date->weekOfYear -$date_start->weekOfYear ;
        foreach ($khoi as $key => $value) {
            foreach ($value->LopHoc as  $lop_hoc) {
                $lop_hoc['giao_trinh'] = $this->HoatDongRepository->showGiaoTrinhTheoLop($tuan_chon,$lop_hoc->id,$id_nam_hoc);
            }
        }
        // dd($khoi);
        return view('quan-ly-giao-trinh.index',compact('so_luong_tuan','tuan_chon','tuan_hien_tai','khoi','id_nam_hien_tai','id_nam_hoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pheDuyetGiaoTrinh(Request $request)
    {
        DB::transaction(function () use($request){
            $id = $request->id;
            $type = $request->type;
            if($type == 1){
                $content = $request->ly_do_tu_choi;
                $title = 'Giáo trình bị từ chối';
                $this->HoatDongRepository->delete($id);
            }else{
                $content = 'Giáo trình của bạn đã được nhà trường phê duyệt';
                $title = 'Giáo trình được phê duyệt';
                $this->HoatDongRepository->update($id,['type'=>2]);
            }
            
            $id_giao_vien = $request->id_giao_vien;
            $id_user_giao_vien = $this->GiaoVienRepository->find($id_giao_vien)->user_id;
            $dataCreate = [
                'title'     => $title,
                'content'   => $content,
                'auth_id'   => Auth::id(),
            ];
            $thongbao_id = $this->NoiDungThongBaoRepository->create($dataCreate)->id;

            $link = [
                'route_name' => 'thong-bao.show',
                'params'     => ['id' => $thongbao_id],
            ];
            $route = json_encode($link);
            $dataCreate['route'] = $route;
            $dataCreate['thongbao_id'] = $thongbao_id;
            $dataCreate['user_id'] = $id_user_giao_vien;
            $this->NotificationRepository->create($dataCreate);
            $this->ThongBaoRepository->create([
                'thongbao_id' => $dataCreate['thongbao_id'],
                'user_id' => $id_user_giao_vien,
            ]);
            
            
            }
        );
    }
}
