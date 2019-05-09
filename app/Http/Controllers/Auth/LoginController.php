<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $scredentials = $request->only('email', 'password');

        if (\Auth::attempt($scredentials))
        {
            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Đăng nhập thất bại. E-mail hoặc mật khẩu không đúng!');
    }

    public function getLogout()
    {
        \Auth::logout();
        return redirect()->route('home');
    }
}
