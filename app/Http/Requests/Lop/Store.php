<?php

namespace App\Http\Requests\Lop;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
        // dd($this->ten_lop);
        return [
            'ten_lop' => 'required|unique:lop_hoc',
        ];
    }

    public function messages(){
        return [
            'ten_lop.required' => 'Tên lớp không được để trống',
            'ten_lop.unique' => 'Tên lớp đã tồn tại',
        ];
    }
}
