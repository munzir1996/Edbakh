<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Edbakh | Cpanel</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('files/img/favicon2.png')}}"/>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('public/admin/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/admin/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('stylesheets')
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

    @include('admin.layouts.top_navbar')

    @include('admin.layouts.sidebar')

    <div class="content-wrapper">

        @yield('content')

    </div>

</div>

<!-- jQuery -->
<script src="{{asset('public/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>

<script>

    $('.ck_editor').ckeditor();

    CKEDITOR.config.extraPlugins = 'justify';
    CKEDITOR.config.extraPlugins = 'bidi';

</script>
@yield('scripts')
</body>
</html>
