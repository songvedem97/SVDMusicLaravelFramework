<?php

namespace App\Http\Requests\Area;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name_area' => 'required|unique:area,name_area,',
            'upload_image' => 'required',
            'prioty' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_area.required' => 'Tên khu vực không được để trống',
            'upload_image.required' => 'Ảnh khu vực không được để trống',
            'prioty.required' => 'Prioty không được để trống',
            'name_area.unique' => 'Danh mục đã có trong CSDL',
        ];
    }
}
