<?php

namespace App\Http\Requests\Artist;

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
            'name_artist' => 'required',
            'prioty' => 'required',
        ];
        
    }
    public function messages()
    {
        return [
            'name_artist.required' => 'Tên nghệ sĩ không được để trống',
            'prioty.required' => 'Prioty không được để trống',
        ];
    }
}
