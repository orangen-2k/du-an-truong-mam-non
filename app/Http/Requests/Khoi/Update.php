<?php

namespace App\Http\Requests\Khoi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Khoi;
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
        $dataKhoi = Khoi::find($this->id);
        // dd($this->ten_lop);
        return [
            'ten_khoi' =>  [
                'required', 
                Rule::unique('khoi')
                       ->where('nam_hoc_id', $dataKhoi->nam_hoc_id)->where('id', '!=',$this->id)
            ],
        ];
    }

    public function messages(){
        return [
            'ten_khoi.required' => 'Tên khối không được để trống',
            'ten_khoi.unique' => 'Tên khối đã tồn tại',
        ];
    }
}
