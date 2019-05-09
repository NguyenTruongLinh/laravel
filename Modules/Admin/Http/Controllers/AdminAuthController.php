<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        return view('admin::auth.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($data)) {
            // Authentication passed...
            return redirect()->route('admin.home')->with('success','Đăng nhập thành công!');
        }

        return redirect()->back()->with('error', 'Đăng nhập thất bại. E-mail hoặc mật khẩu không đúng!');
    }

    public function getLogout()
    {
        \Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }
}
