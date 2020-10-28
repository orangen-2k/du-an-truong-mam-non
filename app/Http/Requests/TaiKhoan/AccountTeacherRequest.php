<?php

namespace App\Http\Requests\TaiKhoan;

use Illuminate\Foundation\Http\FormRequest;

class AccountTeacherRequest extends FormRequest
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
            'ma_gv'=>'required|',
            'email' => 'required|email|unique:users,id,email',
            'ten' => 'required',
            'ngay_sinh' => 'required',
            'dan_toc' => 'required',
            'dien_thoai'=>'required|min:11|numeric',
            'chuyen_mon'=>'required',
            'trinh_do'=>'required',
            'noi_dao_tao'=>'required',
            'nam_tot_nghiep'=>'required|numeric',
            'anh'=>'required||mimes:jpeg,jpg,png,gif|max:10000',
            'so_nha'=>'requied',

        ];
    }

    public function messages(){
        return [
            
            'email.email' => 'Email không hợp lệ!',
            'email.unique' => 'Email đã được đăng ký!',
            'required' => ' :attribute không được để trống!',
            'integer' => ' :attribute phải là số nguyên',
            'min' => ' :attribute ít nhất 11 số',
            'numeric' => ' :attribute phải là số',
            'anh.mimes'=>'Nhập sai định dạng ảnh!',
            'anh.max'=>'Kích thước ảnh tối đa 10000kb',
            
        ];
    }
    
    public function attributes()
    {
        return [
            'ten' => 'Họ và tên',
            'ngay_sinh' => 'Ngày sinh ',
            'dan_toc' => 'Dân tộc',
            'dien_thoai' => 'SĐT ',
            'trinh_do'=>'Trình độ',
            'chuyen_mon'=>'Chuyên môn',
            'noi_dao_tao'=>'Nơi đào tạo',
            'nam_tot_nghiep'=>'Năm tốt nghiệp',
            'anh'=>'Ảnh',
           
           
        ];
    }
}
