<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Repositories\HocSinhRepository;

use Illuminate\Support\Facades\Route;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $AccountRepository;
    protected $HocSinh;

    public function __construct(
        AccountRepository $AccountRepository,
        HocSinhRepository $HocSinh

    ) {
        $this->AccountRepository = $AccountRepository;
        $this->HocSinh = $HocSinh;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $params['keyword'] = trim($request->has('keyword') ? $request->keyword : null);
        $params['active'] = $request->has('active') ? $request->active : null;
        if (!isset($params['page_size'])) {
            $params['page_size'] = config('common.paginate_size.default');
        }
        $route_name = Route::current()->action['as'];
        if ($route_name == "account.ds-hs") {
            $params['role'] = 3;
            $rederView = 'quan-ly-tai-khoan.ds-hoc-sinh';
        } elseif ($route_name == "account.ds-gv") {
            $params['role'] = 2;
            $rederView = 'quan-ly-tai-khoan.ds-giao-vien';
        } else {
            $params['role'] = 1;
            $rederView = 'quan-ly-tai-khoan.index';
        }

        $data = $this->AccountRepository->getAllSchool($params);
        $data->appends($request->all())->links();

        $all_account = $this->AccountRepository->getAll();

        return view($rederView, compact('data', 'params', 'route_name','all_account'));
    }

    public function editStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->active = $user->active == 1 ? 2 : 1;
        $user->save();
        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quan-ly-tai-khoan/create');

    }

    public function createTeacher()
    {
        return view('quan-ly-tai-khoan/create-teacher');

    }

    public function createStudent()
    {
        return 'đây là view tạo tk hs';

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
    public function destroy($id)
    {
        //
    }

    public function gopTaiKhoan(Request $request){
        $array_id_tk = $request->array_account;
        $id_chinh = $request->id_tk_chinh;
        $arr = [];
        $arr2 = [];
        foreach($array_id_tk as $val){
            if($val !== $id_chinh){
                array_push($arr,$val);
                $hs_tk_gop =  $this->HocSinh->getHocSinhByIdTk($val);
                foreach($hs_tk_gop as $hs){
                array_push($arr2,$hs->id);
                   $this->HocSinh->updateHocSinh($hs->id,['user_id' => $id_chinh]);
                }
                  $this->AccountRepository->update($val,['active' => 0]);
            }
        }
        return 'ok';
    }
}
