<?php

namespace App\Http\Requests\KhoanThu;

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
        $dataCheck = [];
        foreach ($this->all() as $key => $value) {
            if($key == 'pham_vi_thu'){
                // dd($value);
                if ($value==1) {
                    $dataCheck['id_khoi_thu']='required';
                }elseif($value == 2){
                    $dataCheck['id_lop_thu']='required';
                }
            }
            $dataCheck[$key]='required';    
        }
        $dataCheck['mien_giam']='required|integer|between:0,100'; 
        return $dataCheck;
    }
}
