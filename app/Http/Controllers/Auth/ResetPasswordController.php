<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function sendCodeResetPassword(Request $request)
    {
        $email = $request->email;

        $checkUser = User::where('email', $email)->first();

        if (!$checkUser)
        {
            return redirect()->back()->with('error','Email không tồn tại!');
        }

        $code = bcrypt(md5(time().$email));

        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();

        return redirect()->back()->with('success','Link lấy lại mật khẩu đã được gửi tới email của bạn. Vui lòng kiểm tra email!');
    }

    public function resetPassword()
    {
        return view('auth.passwords.reset');
    }
}
