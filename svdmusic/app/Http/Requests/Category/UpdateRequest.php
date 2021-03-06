<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name_category' => 'required|unique:category,name_category,'.request()->id,
            'upload_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'prioty' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_category.required' => 'Name không được để trống',
            'upload_image.mimes' => 'Chỉ chấp nhận định dạng ảnh với đuôi .jpg .jpeg .png .gif',
            'upload_image.max' => 'Giới hạn dung lượng hình ảnh không quá 2MB',
            'prioty.required' => 'Prioty không được để trống',
            'name_category.unique' => 'Danh mục đã có trong CSDL',
        ];
    }
}
