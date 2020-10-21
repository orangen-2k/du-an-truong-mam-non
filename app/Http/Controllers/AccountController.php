<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepository;
use App\User;
use Auth;
use Hash;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\DangKiNhapHoc\CreateNhapHoc;
use App\Http\Requests\Auth\EditTaiKhoanRequest;
use App\Models\GiaoVien;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;    

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $AccountRepository;
    public function __construct(
        AccountRepository $AccountRepository
    ) {
        $this->AccountRepository = $AccountRepository;
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
        return view($rederView, compact('data', 'params', 'route_name'));
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
    public function editProfile()
    {
         return view('auth.profile');
     }
 
    public function updateProfile(RegisterRequest $request)
    {
         $user = Auth::user();
         $params = $request->all();

         $user->update($params);
         return redirect()->back()->with("message","Cập nhật email thành công !");
    }
 
  public function changePasswordForm()
    {
       //  $user = User::find($id);
        return view('auth.change_password');
    }
  public function changePassword(Request $request)
  {
    if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
        return redirect()->back()
            ->with("error","Mật khẩu cũ bạn vừa nhập không chính xác!Vui lòng kiểm tra lại.");
    }

    if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
        return redirect()->back()
            ->with("error","Mật khẩu mới không được trùng với mật khẩu hiện tại của bạn.Vui lòng chọn một mật khẩu khác.");
    }

    $request->validate([
        'current_password' => ['required'],
        'new_password' => ['required'],
        'password_confirmation' => ['same:new_password'],
    ]);
    
    User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
    Auth::logout();
    return redirect()->route('login')->with("message","Đăng nhập lại để tiếp tục");
   
  }
 
  //sửa tk trường
  public function getEditAdmin($id){
    $user= User::find($id);
    return view('quan-ly-tai-khoan.edit-quan-tri',compact('user'));
  }
  public function editAdmin(RegisterRequest $request,$id){
    $user = User::find($id);
    $params = $request->all();
    $params['name']= request()->get('name');
    $params['email'] = request()->get('email');
    $user->update($params);
    return redirect()->back()->with("message","Cập nhật tài khoản thành công !");
  }
//sửa tk giáo viên
  public function getEditTeacher($id)
  { 
      // $user= User::find($id);
      $giao_vien=GiaoVien::find($id);
     
    return view('quan-ly-tai-khoan.edit-giao-vien',compact('giao_vien'));
  }
  public function editTeacher(EditTaiKhoanRequest $request,$id)
  {
         $giao_vien=GiaoVien::find($id);
         $params = $request->all();
         $giao_vien->update($params);
         return redirect()->back()->with("message","Cập nhật tài khoản thành công !");
  }

}
