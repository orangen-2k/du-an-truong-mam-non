<?php

namespace App\Http\Requests\DangKiNhapHoc;

use Illuminate\Foundation\Http\FormRequest;

class CreateNhapHoc extends FormRequest
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
            'ten' => 'required',
            'gioi_tinh' => 'required',
            'avatar' => 'required',
            'ngay_sinh' => 'required',
            'dan_toc' => 'required',
            'ten_cha' => 'required',
            'cmtnd_cha' => 'required|integer',
            'dien_thoai'=>'required|min:11|numeric',
            'dien_thoai_cha' => 'required|min:11|numeric',
            'ten_me' => 'required',
            'cmtnd_me' => 'required|integer|min:0',
            'dien_thoai_me' => 'required|min:11|numeric',
            'dien_thoai_dang_ki' => 'required|min:11|numeric',
            'email_dang_ky' => 'required|email:rfc,dns',
            'ho_khau_thuong_tru_matp' => 'required',
            'ho_khau_thuong_tru_maqh' => 'required',
            'ho_khau_thuong_tru_xaid' => 'required',
            'ho_khau_thuong_tru_so_nha' => 'required',
            'noi_o_hien_tai_matp' => 'required',
            'noi_o_hien_tai_maqh' => 'required',
            'noi_o_hien_tai_xaid' => 'required',
            'noi_o_hien_tai_so_nha' => 'required',
    ];
    }


    public function messages()
    {
        return [
            'required' => ' :attribute không được để trống',
            'integer' => ' :attribute phải là số nguyên',
            'min' => ' :attribute ít nhất 11 số',
            'numeric' => ' :attribute phải là số',
        ];
    }

    public function attributes()
    {
        return [
            'ten' => 'Họ và tên bé',
            'gioi_tinh' => 'Giới tính',
            'avatar' => 'Ảnh bé',
            'ngay_sinh' => 'Ngày sinh bé',
            'dan_toc' => 'Dân tộc',
            'ten_cha' => 'Họ tên cha bé',
            'cmtnd_cha' => 'Chứng minh thư',
            'dien_thoai_cha' => 'SĐT ',
            'ten_me' => 'Tên ',
            'cmtnd_me' => 'Chứng minh thư',
            'dien_thoai_me' => 'Điện thoại ',
            'dien_thoai_dang_ki' => 'Điện thoại đăng kí',
            'email_dang_ky' => 'Email đăng kí',
            'ho_khau_thuong_tru_matp' => 'Thành phố',
            'ho_khau_thuong_tru_maqh' => 'Quận huyện ',
            'ho_khau_thuong_tru_xaid' => 'Xã phường',
            'ho_khau_thuong_tru_so_nha' => 'Số nhà',
            'noi_o_hien_tai_matp' => 'Thành phố ',
            'noi_o_hien_tai_maqh' => 'Quận huyện',
            'noi_o_hien_tai_xaid' => 'Xã phường ',
            'noi_o_hien_tai_so_nha' => 'Số nhà',
        ];
    }
}
