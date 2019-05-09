<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_old' => 'required',
            'password_new' => 'required|min:6',
            're_password_new' => 'required|same:password_new',

            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'password_old.required' => 'Mật khẩu không được để trống!',
            'password_new.required' => 'Mật khẩu không được để trống!',
            'password_new.min' => 'Mật khẩu phải từ 6 ký tự trở lên!',
            'password_new.same' => 'Mật khẩu không được trùng với mật khẩu cũ!',
            're_password_new.required' => 'Mật khẩu xác nhận không được để trống!',
            're_password_new.same' => 'Mật khẩu xác nhận không trùng khớp!',

            'password.required' => 'Mật khẩu không được để trống!',
        ];
    }
}
