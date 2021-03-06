<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Free Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('theme_admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_admin/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('theme_admin/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('theme_admin/css/pages.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('theme_admin/images/favicon.png') }}" />
</head>

<body>
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissable popup-alert-messages" id="flash-msg">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        {{ session()->get('error') }}
    </div>
@endif
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auto-form-wrapper">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="label">E-mail</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="label">Mật khẩu</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" placeholder="*********" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary submit-btn btn-block">Đăng nhập</button>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block g-login">
                                    <img class="mr-3" src="{{ asset('theme_admin/images/file-icons/icon-google.svg') }}" alt="">Log in with Google</button>
                            </div>
                            <div class="text-block text-center mt-4">
                            </div>
                        </form>
                    </div>
                    <ul class="auth-footer">
                        <li>
                            <a href="#">Conditions</a>
                        </li>
                        <li>
                            <a href="#">Help</a>
                        </li>
                        <li>
                            <a href="#">Terms</a>
                        </li>
                    </ul>
                    <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('theme_admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('theme_admin/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- inject:js -->
<!-- endinject -->
<script>
    $(document).ready(function () {
        $("#flash-msg").delay(4000).fadeOut("slow");
    });
</script>
</body>

</html>