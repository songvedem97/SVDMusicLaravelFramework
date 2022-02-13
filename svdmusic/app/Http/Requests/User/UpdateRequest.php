<?php

namespace App\Http\Requests\User;

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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|max:20',
            'confirm_password' => 'required|min:8|max:20|same:password',
            'upload_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Username không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng @',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password chứa tối thiểu 8 kí tự trở lên',
            'password.max' => 'Password chứa tối đa 20 kí tự',
            'confirm_password.required' => 'Repeat password không được để trống',
            'confirm_password.min' => 'Repeat password chứa tối thiểu 8 kí tự trở lên',
            'confirm_password.max' => 'Repeat password chứa tối đa 20 kí tự',
            'confirm_password.sanme' => 'Repeat password không khớp',
            'upload_image.mimes' => 'Chỉ chấp nhận định dạng ảnh với đuôi .jpg .jpeg .png .gif',
            'upload_image.max' => 'Giới hạn dung lượng hình ảnh không quá 2MB',
            'name.unique' => 'Username đã tồn tại',
            'email.unique' => 'Địa chỉ email đã có tồn tại',
        ];
    }
}
