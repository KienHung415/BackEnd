<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'thumb'=>'required',
            'file_path'=>'required'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên sản phẩm',
            'thumb.required'=>'Ảnh không được trống',
            'file_path.required'=>'File nhạc không được trống'
        ];
    }
}
