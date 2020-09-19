<?php

namespace App\Http\Requests\Lop;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'ten_lop' => 'required|unique:lop_hoc,ten_lop,'.request()->lop_id,
        ];
    }
    public function messages()
    {
        return [
            'ten_lop.required' => 'Tên lớp không được để trống',
            'ten_lop.unique' => 'Tên lớp đã tồn tại'
        ];
    }
}
