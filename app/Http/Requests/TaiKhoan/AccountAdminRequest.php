<?php

namespace App\Http\Requests\TaiKhoan;

use Illuminate\Foundation\Http\FormRequest;

class AccountAdminRequest extends FormRequest
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
            'username'=>'required|unique:users,id,username',
            'email' => 'required|email|unique:users,id,email',
            'phone_number'=>'required|min:11|numeric',
            //'avatar'=>'required|max:10000',
           
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng điền họ tên!',
            'email.required' => 'Vui lòng điền Email!',
            'email.email' => 'Email không hợp lệ!',
            'email.unique' => 'Email đã được đăng ký!',
            'username.required'=>'Vui lòng điền UserName! ',
            'username.unique'=>'UserName đã tồn tại !',
            'phone_number.required'=>'Vui lòng điền số điện thoại!',
            'phone_number.max'=>'Số điện thoại tối đa 11 số!',
            'phone_number.numberic'=>'Số điện thoại phải là số',
            // 'avatar.required'=>'Vui lòng lựa chọn ảnh!',
            // 'avatar.max'=>'Kích thước ảnh tối đa 10000kb!',
            
            
        ];
    }
}
