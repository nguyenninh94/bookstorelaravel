<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required',
           'username' => 'required|max:60|unique:admins',
           'email' => 'required|email|unique:admins',
           'password' => 'required|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
           'name.required' => 'Bạn chưa nhập tên',
           'username.required' => 'Bạn chưa nhập tên tài khoản',
           'username.max' => 'Tên tài khoản quá dài',
           'username.unique' => 'Tên tài khoản đã tồn tại',
           'email.required' => 'Bạn chưa nhập địa chỉ email',
           'email.email' => 'Email không đúng định dang',
           'email.unique' => 'Email này đã tồn tại',
           'password.required' => 'Bạn chưa nhập mật khẩu',
           'password.min' => 'Mật khẩu phải ít nhất 8 ký tự',
           'password.confirmed' => 'Mật khẩu xác nhận không chính xác'
        ];
    }
}
