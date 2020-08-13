<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'required',
            'tags' => 'required',
        ];
    }
    public function messages()
    {
        return [
        'name.required' => 'Tên sản phẩm không được trống',
        'name.unique' => 'Tên sản phẩm đã tồn tại',
        'name.max:255' => 'Tên sản phẩm tối đa 255 ký tự',
        'price.required'=> 'Giá sản phẩm không được trống',
        'category_id.required'=> 'Danh mục sản phẩm không được trống',
        'contents.required'=> 'Nội dung sản phẩm không được trống',
        'tags.required'=> 'Tag sản phẩm không được trống',
    ];
    }
}
