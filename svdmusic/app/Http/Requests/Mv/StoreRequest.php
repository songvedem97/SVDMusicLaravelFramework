<?php

namespace App\Http\Requests\Mv;

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
            'name_mv' => 'required|unique:mv,name_mv,',
            'upload_image' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'link_mv'=>'required',
            'song_id'=>'required',
            'name_artist' => 'required',
            'artist_id'=>'required',
            'prioty' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_mv.required' => ' Tên MV không được để trống',
            'name_artist.required' => ' Tên nghệ sĩ không được để trống',
            'upload_image.required' => 'Ảnh MV không được để trống',
            'upload_image.mimes' => 'Chỉ chấp nhận định dạng ảnh với đuôi .jpg .jpeg .png .gif',
            'upload_image.max' => 'Giới hạn dung lượng hình ảnh không quá 2MB',
            'link_mv.required' => 'Link MV không được để trống',
            'song_id.required' => 'Vui lòng lựa chọn bài hát cho MV',
            'artist_id.required' => 'Vui lòng lựa chọn nghệ sĩ cho MV',
            'prioty.required' => 'Prioty không được để trống',
            'name_mv.unique' => 'MV đã có trong CSDL',
        ];
    }
}
