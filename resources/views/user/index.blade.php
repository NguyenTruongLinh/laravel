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
                                <h4>Hồ sơ của tôi</h4>
                                <p>Quản lý thông tin hồ sơ</p>
                            </div>
                            <hr>
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">E-mail</label>
                                            <div class="col-sm-9">
                                                <label class="col-form-label">{{ substr_replace($user->email,"****",2,7) }}</label>
                                                <a href="{{ route('get.email.view') }}">Thay đổi</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Số điện thoại</label>
                                            <div class="col-sm-9">
                                                <label class="col-form-label">{{ substr_replace($user->phone,"*******",0,7) }}</label>
                                                <a href="{{ route('get.phone.view') }}">Thay đổi</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Họ tên</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Địa chỉ</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                                            </div>
                                        </div>
                                        <div class="form-group row sex">
                                            <label class="col-sm-3 col-form-label text-right">Giới tính</label>
                                            <div class="col-sm-2 pt-2">
                                                <div class="form-radio">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="" name="sex" id="nam" value="nam" {{($user->sex == "nam" ? "checked='checked'": '')}}>
                                                        <label class="sex-radio" for="nam"></label>
                                                        <label for="nam">Nam</label>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pt-2">
                                                <div class="form-radio">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="" name="sex" id="nu" value="nu" {{($user->sex == "nu" ? "checked='checked'": '')}}>
                                                        <label class="sex-radio" for="nu"></label>
                                                        <label for="nu">Nữ</label>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Ngày sinh</label>
                                            <div class="col-sm-9">
                                                <div class='input-group date' id="datetimepicker">
                                                    <input type="text" class="form-control" />
                                                    <span class="input-group-addon">
                                        <span class="far fa-calendar-alt"></span>
                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-save-user">
                                            <button type="submit" class="btn">Lưu</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 right-side d-flex align-items-center justify-content-center">
                                        <div>
                                            <div class="avatar mb-3">
                                                <img id="output_img" class="choose-image" src="{{ isset($user->avatar) ? pare_url_file($user->avatar) : asset('theme_frontend/img/businessman.svg') }}" alt="">
                                            </div>
                                            <input id="input_img" type="file" name="avatar">
                                            <button class="btn btn-choose-image" type="button">Chọn ảnh</button>
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
        $(function () {
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#output_img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#input_img").change(function() {
                readURL(this);
            });

            $('.btn-choose-image, .choose-image').bind("click" , function () {
                $('#input_img').click();
            });
        });
    </script>
@endsection