@extends('layouts.app')
@section('content')
    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Liện hệ chúng tôi</h4>
            <div class="site-pagination">
                <a href="">Trang chủ</a> /
                <a href="">Liên hệ</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->


    {{--Contact form--}}
    <div class="container pt-5 pb-5">
        <form method="POST" action="">
            @csrf

            <div class="form-group row justify-content-center">
                <div class="col-md-6">
                    <label for="name" class=" col-form-label text-md-right">{{ __('Họ tên') }}</label>

                    <div class="">
                        <input id="name" type="text" class="form-control{{ $errors->has('c_name') ? ' is-invalid' : '' }}" name="c_name" value="{{ old('c_name') }}" required autofocus>

                        @if ($errors->has('c_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('c_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="row col-md-6">
                    <div class="col-md-6 p-0 pr-2">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-mail') }}</label>

                        <div>
                            <input id="email" type="email" class="form-control{{ $errors->has('c_email') ? ' is-invalid' : '' }}" value="{{ old('c_email') }}" name="c_email" required>

                            @if ($errors->has('c_email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('c_email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 p-0 pl-2">
                        <label for="phone" class="col-form-label text-md-right">{{ __('Số điện thoại') }}</label>

                        <div>
                            <input id="phone" type="number" class="form-control{{ $errors->has('c_phone') ? ' is-invalid' : '' }}" name="c_phone" value="{{ old('c_phone') }}" required>

                            @if ($errors->has('c_phone'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('c_phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-6">
                    <label for="subject" class=" col-form-label text-md-right">{{ __('Tiêu đề') }}</label>

                    <div class="">
                        <input id="subject" type="text" class="form-control{{ $errors->has('c_subject') ? ' is-invalid' : '' }}" name="c_subject" value="{{ old('c_subject') }}" required autofocus>

                        @if ($errors->has('c_subject'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('c_subject') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-6">
                    <label for="content" class=" col-form-label text-md-right">{{ __('Nội dung') }}</label>

                    <div class="">
                        <textarea id="content" type="text" class="form-control{{ $errors->has('c_content') ? ' is-invalid' : '' }}" name="c_content" rows="3" required autofocus>{{ old('c_content') }}</textarea>

                        @if ($errors->has('c_content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('c_content') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Gửi') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    {{--End contact form--}}

@stop