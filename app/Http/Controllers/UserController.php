<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPassword;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // View index page
    public function index()
    {
        $user = User::find(get_data_user('web'));

        return view('user.index', compact('user'));
    }

    // Lay danh sach Don mua hang cua nguoi mua
    public function getPurchase($id)
    {

        $user = User::find(get_data_user('web'));

        $orders = Order::where('or_user_id',$id)->get();

        $viewData = [
            'user' => $user,
            'orders' => $orders
        ];

        return view('user.purchase',$viewData);
    }

    public function getPurchaseProcessed($id)
    {
        $user = User::find(get_data_user('web'));

        $orders = Order::where('or_user_id',$id)->get();

        $viewData = [
            'user' => $user,
            'orders' => $orders
        ];

        return view('user.purchase-done',$viewData);
    }

    // Update thong tin khach hang
    public function updateProfile(Request $request)
    {
        $user = User::where('id',get_data_user('web'))->first();

        $sex = Input::get('sex', '0');

        if ($sex == '0')
        {
            return redirect()->back()->with('error','Vui lòng chọn giới tính!');
        }

        if ($request->hasFile('avatar'))
        {
            $file = upload_image('avatar');

            if (isset($file['name']))
            {
                $user->avatar = $file['name'];
//                $user->update(['avatar' => $file['name']]);
            }
        }

        User::where('id',get_data_user('web'))->update($request->except('_token'));

        $user->save();

        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }

    // View Change Password Page
    public function viewPassword()
    {
        return view('user.password');
    }

    //Update password User
    public function updatePassword(RequestPassword $requestPassword)
    {
        $user = User::find(get_data_user('web'));

        if (Input::get('password_new') == get_data_user('web','password'))
        {
            return redirect()->back()->with('error', 'Mật khẩu mới không được trùng mật khẩu cũ!');
        }

        if (Hash::check($requestPassword->password_old,get_data_user('web','password')))
        {
            $user->password = bcrypt($requestPassword->password_new);
            $user->save();

            return redirect()->route('get.profile.view',Session::flash('success','Thay đổi mật khẩu thành công!'));
        }

        return redirect()->back()->with('error', 'Mật khẩu cũ không đúng');
    }

    // View Change phone page
    public function viewPhone()
    {
        $user = User::where('id',get_data_user('web'))->first();

        return view('user.phone', compact('user'));
    }

    // Check password of Change phone page
    public function checkPassword()
    {
        $pass = Input::get('password');

        if (Hash::check($pass,get_data_user('web','password')))
        {
            return redirect('user/account/phone/step-2');
        }

        return redirect()->back()->with('error', 'Mật khẩu không đúng');
    }

    // View step 2 of Change phone page
    public function viewPhoneStep2()
    {
        $user = User::where('id',get_data_user('web'))->first();

        return view('user.phone-step2', compact('user'));
    }

    // Update phone User
    public function changePhone(Request $request)
    {
        $user = User::where('id',get_data_user('web'))->first();

        $user->phone = $request->new_phone;

        $user->save();

        return redirect()->route('get.profile.view',Session::flash('success','Cập nhật thành công!'));
    }

    // View change email page
    public function viewEmail()
    {
        $user = User::where('id',get_data_user('web'))->first();

        return view('user.email', compact('user'));
    }

    // Check password of Change email page
    public function checkPasswordEmail()
    {
        $pass = Input::get('password');

        if (Hash::check($pass,get_data_user('web','password')))
        {
            return redirect('user/account/email/step-2');
        }

        return redirect()->back()->with('error', 'Mật khẩu không đúng');
    }

    // View step 2 of Change email page
    public function viewEmailStep2()
    {
        $user = User::where('id',get_data_user('web'))->first();

        return view('user.email-step2', compact('user'));
    }

    // Update email User
    public function changeEmail(Request $request)
    {
        $user = User::where('id',get_data_user('web'))->first();

        $user->email = $request->new_email;

        $user->save();

        return redirect()->route('get.profile.view',Session::flash('success','Cập nhật thành công!'));
    }
}
