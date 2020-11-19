<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class EditTaiKhoanRequest extends FormRequest
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
            'name'=>'required',
            'email' => 'required|email|unique:users,id,email',
            'avatar'=>'mimes:jpeg,jpg,png,gif|max:10000',
    ];
    }


    public function messages()
    {
        return [
            'name.required'=>'Vui lòng điền họ tên!',
            'email.required' => 'Vui lòng điền Email!',
            'email.email' => 'Email không hợp lệ!',
            'email.unique' => 'Email đã được đăng ký!',
            'avatar.required'=>'Bạn chưa chọn ảnh!',
            'avatar.mimes'=>'Nhập sai định dạng ảnh!',
            'avatar.max'=>'Kích thước ảnh tối đa 10000kb',
        ];
    }


}
