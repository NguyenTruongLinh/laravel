@extends('layouts.app')
@section('content')


    <!-- cart section end -->
    <section class="cart-section p-lg-4 profile">
        <div class="container">
            <div class="row">
                <div class="user-penal">
                    <div class="user-page d-flex align-items-center">
                        <div class="user-avatar">
                            <img src="{{ isset($user->avatar) ? pare_url_file($user->avatar) : asset('theme_frontend/img/businessman.svg') }}" alt="">
                        </div>
                        <div class="user-name ml-2">
                            <div class="name">
                                <h5>{{ get_data_user('web','name') }}</h5>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-5 body-side-left">
                        <a href="{{ route('get.profile.view') }}"><i class="far fa-user"></i> Tài khoản của tôi</a>
                        <ul class="change-password">
                            <li class="mb-1"><a href="{{ route('get.profile.view') }}">Hồ sơ</a></li>
                            <li><a class="active" href="{{ route('get.password.view') }}">Đổi mật khẩu</a></li>
                        </ul>
                        <a class="mt-4" href="{{ route('get.purchase.view',get_data_user('web')) }}"><i class="far fa-file-alt"></i> Đơn mua</a>
                    </div>
                </div>
                <div class="main-content">
                    <div class="content">
                        <div class="p-4">
                            <div class="title">
                                <h4>Đổi mật khẩu</h4>
                                <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
                            </div>
                            <hr>
                            <form method="POST">
                                @csrf
                                <div class="col-md-9 m-auto pt-3">
                                    <div class="form-group row justify-content-center">
                                        <label class="col-sm-3 col-form-label text-right">Mật khẩu hiện tại</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control" name="password_old" >
                                            @if ($errors->has('password_old'))
                                                <p class="text-danger">{{ $errors->first('password_old') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="col-sm-3 col-form-label text-right">Mật khẩu mới</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control" name="password_new" >
                                            @if ($errors->has('password_new'))
                                                <p class="text-danger">{{ $errors->first('password_new') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="col-sm-3 col-form-label text-right">Nhập lại mật khẩu</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control" name="re_password_new" >
                                            @if ($errors->has('re_password_new'))
                                                <p class="text-danger">{{ $errors->first('re_password_new') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="btn-change-pass">
                                        <button type="submit" class="btn">Xác nhận</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->
@stop