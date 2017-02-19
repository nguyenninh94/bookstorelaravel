<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:authors'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên tác giả',
            'name.unique' => 'Tên tác giả đã tồn tại'
        ];
    }
}
