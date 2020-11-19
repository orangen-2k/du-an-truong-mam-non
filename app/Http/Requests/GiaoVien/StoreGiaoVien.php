<?php

namespace App\Http\Requests\GiaoVien;

use Illuminate\Foundation\Http\FormRequest;

class StoreGiaoVien extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = $this->all();
        unset($data['_token']);
        unset($data['lop_id']);
        unset($data['khoi']);
  
        return [
            'ten'   => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|unique:users,email|email',
            'ngay_sinh'  => 'required',
            'gioi_tinh'  => 'required',
            'dan_toc'    => 'required',
            'dien_thoai' => 'required|digits:10|unique:giao_vien,dien_thoai',

            'ho_khau_thuong_tru_matp'  => 'required',
            'ho_khau_thuong_tru_maqh'  => 'required',
            'ho_khau_thuong_tru_xaid'  => 'required',
            'ho_khau_thuong_tru_so_nha'  => 'required',
            'noi_o_hien_tai_matp'  => 'required',
            'noi_o_hien_tai_maqh'  => 'required',
            'noi_o_hien_tai_xaid'  => 'required',
            'noi_o_hien_tai_so_nha'  => 'required',

            'trinh_do'  => 'required',
            'chuyen_mon'  => 'required',
            'noi_dao_tao'  => 'required',
            'nam_tot_nghiep'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được để trống',
            'numeric' => 'Không đúng dạng số điện thoại',

            'ten.regex' => 'Họ tên chưa đúng',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Vui lòng nhập đúng định dạng Email',

            'dien_thoai.unique' => 'Số điện thoại đã tồn tại'
        ];
    }
}
