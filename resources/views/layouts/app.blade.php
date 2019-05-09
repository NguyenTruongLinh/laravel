<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Divisima | eCommerce Template</title>
    <meta charset="UTF-8">
    <meta name="description" content=" Divisima | eCommerce Template">
    <meta name="keywords" content="divisima, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('theme_frontend/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('theme_frontend/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('theme_frontend/css/flaticon.css') }}"/>
    <link rel="stylesheet" href="{{ asset('theme_frontend/css/slicknav.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('theme_frontend/css/jquery-ui.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('theme_frontend/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('theme_frontend/css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('theme_frontend/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('theme_frontend/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('theme_frontend/css/page.css') }}"/>

    <script src="https://code.jquery.com/jquery-3.4.0.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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

@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissable popup-alert-messages" id="flash-msg">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        {{ session()->get('warning') }}
    </div>
@endif
<!-- Page Preloder -->
{{--<div id="preloder">--}}
    {{--<div class="loader"></div>--}}
{{--</div>--}}

@include('components.header')


@yield('content')


@include('components.footer')



<!--====== Javascripts & Jquery ======-->
<script src="{{ asset('theme_frontend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('theme_frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme_frontend/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('theme_frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('theme_frontend/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('theme_frontend/js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('theme_frontend/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('theme_frontend/js/main.js') }}"></script>

@yield('script')

<script>
    $(document).ready(function () {
        $("#flash-msg").delay(3000).fadeOut("slow");
    });
</script>

</body>
</html>
