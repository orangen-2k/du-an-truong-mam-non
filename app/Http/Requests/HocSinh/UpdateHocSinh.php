<?php

namespace App\Http\Requests\HocSinh;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHocSinh extends FormRequest
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
        return [
            'ten' => 'required|regex:/^[\pL\s\-]+$/u|min:6|max:40',
            'ten_thuong_goi' => 'regex:/^[\pL\s\-]+$/u|min:6|max:40',
            'ngay_sinh' => 'required|date',
            'gioi_tinh' => 'required|boolean',
            'dan_toc' => 'required|numeric',

            'ho_khau_thuong_tru_matp' => 'required|numeric',
            'ho_khau_thuong_tru_maqh' => 'required|numeric',
            'ho_khau_thuong_tru_xaid' => 'required|numeric',
            'ho_khau_thuong_tru_so_nha' => 'required',

            'noi_o_hien_tai_matp' => 'required|numeric',
            'noi_o_hien_tai_maqh' => 'required|numeric',
            'noi_o_hien_tai_xaid' => 'required|numeric',
            'noi_o_hien_tai_so_nha' => 'required',

            'ten_cha' => 'regex:/^[\pL\s\-]+$/u|min:6|max:40',
            'ten_me' => 'regex:/^[\pL\s\-]+$/u|min:6|max:40',
            'ten_nguoi_giam_ho' => 'regex:/^[\pL\s\-]+$/u|min:6|max:40',

            'dien_thoai_cha' => 'required|regex:/^0[0-9]{9}$/|not_regex:/[a-z]/',
            'dien_thoai_me' => 'required|regex:/^0[0-9]{9}$/|not_regex:/[a-z]/',
            'dien_thoai_nguoi_giam_ho' => 'required|regex:/^0[0-9]{9}$/|not_regex:/[a-z]/',

            'cmtnd_cha' => 'required|numeric',
            'cmtnd_me' => 'required|numeric',
            'cmtnd_nguoi_giam_ho' => 'required|numeric',

            'dien_thoai_dang_ki' => 'required|regex:/^0[0-9]{9}$/|not_regex:/[a-z]/|unique:hoc_sinh,dien_thoai_dang_ki,' . $this->id,
            'email_dang_ky' => 'required|email:rfc,dns|unique:hoc_sinh,email_dang_ky,' . $this->id,
        ];
    }

    public function messages(){
        return [
            'required' => 'Vui lòng nhập trường này',
            'ten.regex' => 'Vui lòng nhập đúng tên',
            'ten_thuong_goi.regex' => 'Vui lòng nhập đúng tên',
            'ten_cha.regex' => 'Vui lòng nhập đúng tên',
            'ten_me.regex' => 'Vui lòng nhập đúng tên',
            'ten_nguoi_giam_ho.regex' => 'Vui lòng nhập đúng tên',
            'numeric' => 'Vui lòng nhập dữ liệu hợp lệ',
            'min' => 'Vui lòng điền trường này trên 6 ký tự',
            'max' => 'Vui lòng điền trường này dưới 40 ký tự',

            'dien_thoai_cha.regex' => 'Vui lòng nhập số điện thoại hợp lệ',
            'dien_thoai_me.regex' => 'Vui lòng nhập số điện thoại hợp lệ',
            'dien_thoai_nguoi_giam_ho.regex' => 'Vui lòng nhập số điện thoại hợp lệ',

            'date' => 'Vui lòng nhập dữ liệu hợp lệ',
            'dien_thoai_dang_ki.required' => 'Vui lòng nhập số điện thoại',
            'dien_thoai_dang_ki.regex' => 'Vui lòng nhập số điện thoại hợp lệ',
            'dien_thoai_dang_ki.unique' => 'Số điện thoại đã tồn tại',

            'email_dang_ky.required' => 'Vui lòng điền Email!',
            'email_dang_ky.email' => 'Email không hợp lệ!',
            'email_dang_ky.unique' => 'Email đã tồn tại!'
        ];
    }
}
