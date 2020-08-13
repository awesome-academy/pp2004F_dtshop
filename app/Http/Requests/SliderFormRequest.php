<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
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
            'name' => 'required|unique:sliders|max:255',
            'description' => 'required',
        ];
    } 

    public function messages()
    {
        return [
        'name.required' => 'Tên slider không được trống',
        'name.unique' => 'Tên slider đã tồn tại',
        'name.max:255' => 'Tên slider tối đa 255 ký tự',
        'description.required'=> 'Mô tả slider không được trống',
    ];
    }
}
