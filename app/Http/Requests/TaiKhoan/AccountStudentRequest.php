<?php

namespace App\Http\Requests\TaiKhoan;

use Illuminate\Foundation\Http\FormRequest;

class AccountStudentRequest extends FormRequest
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
            'ma_hoc_sinh'=>'required|',
            'email_dang_ky' => 'required|email|unique:users,id,email',
            'ten' => 'required',
            'ngay_sinh' => 'required',
            'dan_toc' => 'required',
            'dien_thoai_dang_ki'=>'required|min:11|numeric',
            'noi_sinh'=>'required',
            'ten_thuong_goi'=>'required',
            'doi_tuong_chinh_sach_id'=>'required',
            'ngay_vao_truong'=>'required',
            'avatar'=>'required||mimes:jpeg,jpg,png,gif|max:10000',
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
            'ma_hoc_sinh'=>'Mã học sinh',
            'ten_thuong_goi'=>'Tên thường gọi',
            'ten' => 'Họ và tên',
            'ngay_sinh' => 'Ngày sinh ',
            'dan_toc' => 'Dân tộc',
            'dien_thoai_dang_ki' => 'SĐT ',
            'doi_tuong_chinh_sach_id'=>'Đối tượng chính sách',
            'noi_sinh'=>'Nơi sinh ',
            'nam_tot_nghiep'=>'Năm tốt nghiệp',
            'avatar'=>'Ảnh',
           
           
        ];
    }
}
