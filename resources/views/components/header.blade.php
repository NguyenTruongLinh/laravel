<!-- Header section -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 text-center text-lg-left">
                    <!-- logo -->
                    <a href="{{ route('home') }}" class="site-logo">
                        <img src="{{ asset('theme_frontend/img/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <form class="header-search-form">
                        <input type="text" placeholder="Search on divisima ....">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="user-panel">
                        @if(Auth::check())
                            <div class="up-item item-nav">
                                <i class="flaticon-profile"></i>
                                <a href="#"> {{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}}</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('get.purchase.view',Auth::id()) }}">Đơn mua</a></li>
                                    <li><a href="{{ route('get.profile.view') }}">Cài đặt của tôi</a></li>
                                    <li><a href="{{ route('get.logout.user') }}">Đăng xuất</a></li>
                                </ul>
                            </div>
                        @else
                            <div class="up-item">
                                <i class="flaticon-profile"></i>
                                <a data-toggle="modal" data-target="#login">Đăng nhập</a> | <a data-toggle="modal" data-target="#register">Đăng ký</a>
                            </div>
                        @endif
                        <div class="up-item">
                            <div class="shopping-card">
                                <i class="flaticon-bag"></i>
                                <span>{{ \Cart::count() }}</span>
                            </div>
                            <a href="{{ route('get.list.shopping.cart') }}">Giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <!-- menu -->
            <ul class="main-menu">
                @if(isset($categories))
                    @foreach($categories as $category)
                        <li><a class="{{ request()->is('danh-muc*') ? 'active' : '' }}" href="{{ route('get.list.product',[$category->c_slug,$category->id]) }}">{{ $category->c_name }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </nav>
</header>
<!-- Header section end -->

{{-- Popup Login --}}
<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Đăng nhập</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('post.login') }}">
                    @csrf

                    <div class="form-group row">

                        <div class="col-md-12">
                            <input id="email" type="email" placeholder="E-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Mật khẩu" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-lg-5">
                        <div class="col-md-12">
                            <button type="submit" class="btn bg-pink">
                                {{ __('Đăng nhập') }}
                            </button>
                                <a class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#resetPass">
                                    {{ __('Quên mật khẩu?') }}
                                </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Popup Login end --}}

{{-- Popup Register--}}
<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Đăng ký</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('post.register') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="name" type="text" placeholder="Họ tên" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" type="email" placeholder="E-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="phone" type="number" placeholder="Số điện thoại" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Mật khẩu" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password-confirm" placeholder="Xác nhận mật khẩu" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="row mt-lg-5">
                        <div class="col-md-12">
                            <button type="submit" class="btn bg-pink">
                                {{ __('Đăng ký') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Popup Register end --}}

{{-- Popup Reset Password--}}
<div class="modal fade" id="resetPass" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Đặt Lại Mật Khẩu</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Vui lòng nhập địa chỉ email đã đăng ký</p>
                <form method="POST" action="{{ route('post.reset.password') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" type="email" placeholder="E-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn bg-pink">
                                {{ __('Tiếp tục') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Popup Reset Password end--}}