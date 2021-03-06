<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Free Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('theme_admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('theme_admin/vendors/css/vendor.bundle.base.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('theme_admin/vendors/css/vendor.bundle.addons.css') }}">--}}
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('theme_admin/css/dataTables.bootstrap4.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('theme_admin/css/pages.css') }}">

    <link rel="stylesheet" href="{{ asset('theme_admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('theme_admin/images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('trumbowyg/dist/ui/trumbowyg.css') }}">
</head>

<body>
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissable popup-alert-messages" id="flash-msg">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissable popup-alert-messages" id="flash-msg">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        {{ session()->get('error') }}
    </div>
@endif
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="{{ route('admin.home') }}">
                <img src="{{ asset('theme_admin/images/logo.svg') }}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="{{ asset('theme_admin/images/logo-mini.svg') }}" alt="logo" />
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                <li class="nav-item">
                    <a href="#" class="nav-link">Schedule
                        <span class="badge badge-primary ml-1">New</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-elevation-rise"></i>Reports</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-file-document-box"></i>
                        <span class="count">7</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <div class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                            </p>
                            <span class="badge badge-info badge-pill float-right">View all</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{ asset('theme_admin/images/faces/face4.jpg') }}" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                                </h6>
                                <p class="font-weight-light small-text">
                                    The meeting is cancelled
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{ asset('theme_admin/images/faces/face2.jpg') }}" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                                </h6>
                                <p class="font-weight-light small-text">
                                    New product launch
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{ asset('theme_admin/images/faces/face3.jpg') }}" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                                </h6>
                                <p class="font-weight-light small-text">
                                    Upcoming board meeting
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <span class="count">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                            </p>
                            <span class="badge badge-pill badge-warning float-right">View all</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                                <p class="font-weight-light small-text">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                                <p class="font-weight-light small-text">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-email-outline mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                                <p class="font-weight-light small-text">
                                    2 days ago
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-xl-inline-block">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <span class="profile-text">Hello, {{ get_data_user('admins','name') }} !</span>
                        <img class="img-xs rounded-circle" src="{{ asset('theme_admin/images/faces/face1.jpg') }}" alt="Profile image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <a class="dropdown-item p-0">
                            <div class="d-flex border-bottom">
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                                </div>
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                                </div>
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item mt-2">
                            Manage Accounts
                        </a>
                        <a class="dropdown-item">
                            Change Password
                        </a>
                        <a class="dropdown-item">
                            Check Inbox
                        </a>
                        <a href="{{ route('admin.logout') }}" class="dropdown-item">
                            Đăng xuất
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link">
                        <div class="user-wrapper">
                            <div class="profile-image">
                                <img src="{{ asset('theme_admin/images/faces/face1.jpg') }}" alt="profile image">
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name">{{ get_data_user('admins','name') }}</p>
                                <div>
                                    <small class="designation text-muted">Quản lý</small>
                                    <span class="status-indicator online"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item {{ \Request::route()->getName() == 'admin.home' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        <i class="menu-icon mdi mdi-television"></i>
                        <span class="menu-title">Tổng quan</span>
                    </a>
                </li>
                <li class="nav-item {{ \Request::route()->getName() == 'admin.get.list.category' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.get.list.category') }}">
                        <i class="menu-icon mdi mdi-format-list-checks"></i>
                        <span class="menu-title">Danh mục</span>
                    </a>
                </li>
                <li class="nav-item {{ \Request::route()->getName() == 'admin.get.list.product' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.get.list.product') }}">
                        <i class="menu-icon mdi mdi-package-variant"></i>
                        <span class="menu-title">Sản phẩm</span>
                    </a>
                </li>
                <li class="nav-item {{ \Request::route()->getName() == 'admin.get.list.transaction' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.get.list.transaction') }}">
                        <i class="menu-icon mdi mdi-cart-outline"></i>
                        <span class="menu-title">Đơn hàng</span>
                    </a>
                </li>
                <li class="nav-item {{ \Request::route()->getName() == 'admin.get.list.user' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.get.list.user') }}">
                        <i class="menu-icon mdi mdi-account-outline"></i>
                        <span class="menu-title">Khách hàng</span>
                    </a>
                </li>
                <li class="nav-item {{ \Request::route()->getName() == 'admin.get.list.rating' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.get.list.rating') }}">
                        <i class="menu-icon mdi mdi-star"></i>
                        <span class="menu-title">Đánh giá</span>
                    </a>
                </li>
                <li class="nav-item {{ \Request::route()->getName() == 'admin.get.list.contact' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.get.list.contact') }}">
                        <i class="menu-icon mdi mdi-contact-mail"></i>
                        <span class="menu-title">Liên hệ</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">

            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('theme_admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('theme_admin/vendors/js/vendor.bundle.addons.js') }}"></script>

<script src="{{ asset('trumbowyg/dist/trumbowyg.js') }}"></script>
<script src="{{ asset('trumbowyg/dist/plugins/upload/trumbowyg.upload.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
{{--<script src="{{ asset('theme_admin/js/off-canvas.js') }}"></script>--}}
{{--<script src="{{ asset('theme_admin/js/misc.js') }}"></script>--}}
{{--<script src="{{ asset('theme_admin/js/chart.js') }}"></script>--}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('theme_admin/js/dashboard.js') }}"></script>

<script src="{{ asset('theme_admin/js/datatables-demo.js') }}"></script>
<!-- End custom js for this page-->
{{--<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>--}}

@yield('view.scripts')

<script>
    $(document).ready(function () {
        $("#flash-msg").delay(3000).fadeOut("slow");
    });

    // CKEDITOR.replace('editor');

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

    $('.btn-choose-image').bind("click" , function () {
        $('#input_img').click();
    });

    // ClassicEditor
    //     .create( document.querySelector( '#editor' ) )
    //     .catch( error => {
    //         console.error( error );
    //     } );

    $('#editor').trumbowyg({
        imageWidthModalEdit: true
    });

    // $(function () {
    //     $(".js-order").click(function (event) {
    //         event.preventDefault();
    //         let $this = $(this);
    //         let url = $this.attr('href');
    //         $(".transaction_id").text('').text($this.attr('data-id'));
    //
    //         $("#myModalOrder").modal('show');
    //
    //         console.log(url);
    //     });
    // })

    $(document).ready(function() {
        $('table.table').on("click", "tr.table-tr", function() {
            window.location = $(this).data("url");
        });
    });
</script>
</body>

</html>