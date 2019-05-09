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
                            <li class="mb-1"><a class="active" href="{{ route('get.profile.view') }}">Hồ sơ</a></li>
                            <li><a href="{{ route('get.password.view') }}">Đổi mật khẩu</a></li>
                        </ul>
                        <a class="mt-4" href="{{ route('get.purchase.view',get_data_user('web')) }}"><i class="far fa-file-alt"></i> Đơn mua</a>
                    </div>
                </div>
                <div class="main-content">
                    <div class="content">
                        <div class="p-4">
                            <div class="title">
                                <h4>Đổi Số Điện Thoại</h4>
                                <p>Để đảm bảo tính bảo mật, vui lòng làm theo các bước sau để đổi số điện thoại</p>
                            </div>
                            <hr>
                            <div class="change-phone-stepper">
                                <div class="stepper">
                                    <div class="stepper_step stepper_step-pending">
                                        <div class="stepper_step-icon">
                                            <div class="stepper_step-content stepper_step--finish">1</div>
                                        </div>
                                        <div class="stepper_step-text">Xác minh</div>
                                    </div>
                                    <div class="stepper_step">
                                        <div class="stepper_step-icon">
                                            <div class="stepper_step-content">2</div>
                                        </div>
                                        <div class="stepper_step-text">Cập nhật E-mail</div>
                                    </div>
                                    <div class="stepper_line">
                                        <div class="stepper_line-background"></div>
                                    </div>
                                </div>
                            </div>
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 m-auto">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">E-mail</label>
                                            <div class="col-sm-9">
                                                <label class="col-form-label">{{ substr_replace($user->email,"*******",2,7) }}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Mật khẩu</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="password">
                                                @if ($errors->has('password'))
                                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="btn-save-user">
                                            <button type="submit" class="btn">Lưu</button>
                                        </div>
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

@section('script')
    <script type="text/javascript">

    </script>
@endsection