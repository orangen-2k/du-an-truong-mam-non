<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepository;
use App\User;
use Auth;
use Hash;
use App\Models\Account;
use Illuminate\Http\Request;
use \App\Repositories\HocSinhRepository;
use App\Http\Requests\Account\RegisterSchoolRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\TaiKhoan\AccountAdminRequest;
use App\Http\Requests\TaiKhoan\AccountTeacherRequest;
use App\Http\Requests\DangKiNhapHoc\CreateNhapHoc;
use App\Http\Requests\Auth\EditTaiKhoanRequest;
use App\Models\GiaoVien;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Repositories\GiaoVienRepository;
use App\Repositories\QuanHuyenRepository;
use App\Repositories\TinhThanhPhoRepository;
use App\Repositories\XaPhuongThiTranRepository; 

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $AccountRepository;
    protected $GiaoVienRepository;
    protected $TinhThanhPhoRepository;
    protected $QuanHuyenRepository;
    protected $XaPhuongThiTranRepository;
    protected $HocSinh;

    public function __construct(
        AccountRepository $AccountRepository,
        GiaoVienRepository $GiaoVienRepository,
        TinhThanhPhoRepository $TinhThanhPhoRepository,
        QuanHuyenRepository $QuanHuyenRepository,
        XaPhuongThiTranRepository $XaPhuongThiTranRepository,
        HocSinhRepository $HocSinh

    ) {
        $this->AccountRepository = $AccountRepository;
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->TinhThanhPhoRepository = $TinhThanhPhoRepository;
        $this->QuanHuyenRepository = $QuanHuyenRepository;
        $this->XaPhuongThiTranRepository = $XaPhuongThiTranRepository;
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

        $all_account = $this->AccountRepository->getAccountHocSinh();

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

    public function createSchool()
    {
        return view('quan-ly-tai-khoan/create-school');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSchool(RegisterSchoolRequest $request)
    {
        $data = $this->AccountRepository->storeAcount($request->all());
        return redirect()->back()->with('mess','Đăng ký tài khoản thành công !');
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
    public function editProfile()
    {
         return view('auth.profile');
     }
 
    public function updateProfile(EditTaiKhoanRequest $request)
    {
         $user = Auth::user();
         $user->name   = $request->name;
         $user->email   = $request->email;        
         $get_image = $request->file('anh');
         
         if ($get_image) {
             $get_name_image = $get_image->getClientOriginalName();
             $name_image = current(explode('.',$get_name_image));
             $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
             $get_image->move('upload',$new_image);
             $user->avatar = $new_image;
         }else{
             $user->avatar = '';
         }
         
         $user->update();
         return redirect()->back()->with("message","Cập nhật tài khoản thành công !");
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
        'new_password' => ['required','regex:/^[a-z0-9_-]{7,50}$/','min:8'],
        'password_confirmation' => ['same:new_password'],
    ],
     [
        'current_password.required'=>'Bạn chưa nhập mật khẩu cũ',
        'new_password.required'=>'Bạn chưa nhập mật khẩu mới.',
        'password_confirmation.same'=>'Mật khẩu không khớp.',
        'new_password.regex'=>'Mật khẩu bao gồm các kí tự a-Z, 0-9!'  , 
        'new_password.min'=>'Mật khẩu tối thiểu 8 kí tự! '
       ]

);
    
    User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
    Auth::logout();
    return redirect()->route('login')->with("success_password","Đăng nhập lại để tiếp tục");
   
  }
 
  //sửa tk trường
  public function getEditAdmin($id){
    $user= User::find($id);
    return view('quan-ly-tai-khoan.edit-quan-tri',compact('user'));
  }
  public function editAdmin(AccountAdminRequest $request,$id){
    $user = User::find($id);
    $params = $request->all();
    $user->update($params);
    return redirect()->back()->with("message","Cập nhật tài khoản thành công !");
  }
//sửa tk giáo viên
  public function getEditTeacher($id)
  { 
      // $user= User::find($id);
      $giao_vien=GiaoVien::find($id);
      $thanh_pho = $this->TinhThanhPhoRepository->getAllThanhPho();
      $maqh_gv_hktt = $this->QuanHuyenRepository->getAllQuanHuyen();
      $xaid_gv_hktt = $this->XaPhuongThiTranRepository->getAllXaPhuongThiTran();
      $maqh_gv_noht = $this->QuanHuyenRepository->getQuanHuyenByMaTp($giao_vien->noi_o_hien_tai_matp);
      $xaid_gv_noht = $this->XaPhuongThiTranRepository->getXaPhuongThiTranByMaPh($giao_vien->noi_o_hien_tai_maqh);

    return view('quan-ly-tai-khoan.edit-giao-vien',compact('giao_vien' ,
                                                            'thanh_pho',
                                                            'maqh_gv_hktt', 
                                                            'xaid_gv_hktt',
                                                            'maqh_gv_noht', 
                                                            'xaid_gv_noht' ));
  }
  public function editTeacher(AccountTeacherRequest $request,$id)
  {
         $giao_vien=GiaoVien::find($id);
            $giao_vien->ma_gv = $request->ma_gv;
            $giao_vien->ten = $request->ten;
            $giao_vien->gioi_tinh = $request->gioi_tinh;
            $giao_vien->email = $request->email;
            $giao_vien->dien_thoai = $request->dien_thoai;
            $giao_vien->ngay_sinh = $request->ngay_sinh;
            $giao_vien->dan_toc = $request->dan_toc;
            $giao_vien->trinh_do = $request->trinh_do;
            $giao_vien->chuyen_mon = $request->chuyen_mon;
            $giao_vien->noi_dao_tao = $request->noi_dao_tao;
            $giao_vien->nam_tot_nghiep = $request->nam_tot_nghiep;
            $giao_vien->ho_khau_thuong_tru_matp = $request->ho_khau_thuong_tru_matp;
            $giao_vien->ho_khau_thuong_tru_maqh = $request->ho_khau_thuong_tru_maqh;
            $giao_vien->ho_khau_thuong_tru_xaid = $request->ho_khau_thuong_tru_xaid;
            $giao_vien->ho_khau_thuong_tru_so_nha = $request->ho_khau_thuong_tru_so_nha;
            $giao_vien->noi_o_hien_tai_matp = $request->noi_o_hien_tai_matp;
            $giao_vien->noi_o_hien_tai_maqh = $request->noi_o_hien_tai_maqh;
            $giao_vien->noi_o_hien_tai_xaid = $request->noi_o_hien_tai_xaid;
            $giao_vien->noi_o_hien_tai_so_nha = $request->noi_o_hien_tai_so_nha;
    // $params = $request->all();
    
         $get_image = $request->file('anh');
         if ($get_image) {
             $get_name_image = $get_image->getClientOriginalName();
             $name_image = current(explode('.',$get_name_image));
             $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
             $get_image->move('upload',$new_image);
             $giao_vien->anh = $new_image;
         }else{
             $giao_vien->anh = '';
         }
  
         $giao_vien->update();
         //dd($giao_vien);
          return redirect()->back()->with("message","Cập nhật tài khoản thành công !");
  }
}
