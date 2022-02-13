<?php

namespace App\Http\Requests\Song;

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
            'name_song' => 'required',
            'upload_mp3'=>'mimes:mpga,mp3,wav',
            'category_id'=>'required',
            'artist_id'=>'required',
            'area_id'=>'required',
            'prioty' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_song.required' => 'Tên bài hát không được để trống',
            'category_id.required' => 'Vui lòng lựa chọn danh mục cho bài hát',
            'artist_id.required' => 'Vui lòng lựa chọn nghệ sĩ cho bài hát',
            'area_id.required' => 'Vui lòng lựa chọn khu vực cho bài hát',
            'prioty.required' => 'Prioty không được để trống',
        ];
    }
}
