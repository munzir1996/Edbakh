<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="edbakh">
    <meta name="description" content="{{$setting['description_'.App::getLocale()]}}">
    <meta name="keywords" content="{{$setting['keywords_'.App::getLocale()]}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name', 'Laravel')}}</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('files/img/favicon2.png')}}"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="{{asset('files/'.App::getLocale().'/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('files/'.App::getLocale().'/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('files/'.App::getLocale().'/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('files/'.App::getLocale().'/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('files/'.App::getLocale().'/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('files/'.App::getLocale().'/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('files/'.App::getLocale().'/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('files/'.App::getLocale().'/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('files/'.App::getLocale().'/css/sign_up.css')}}">
    <link rel="stylesheet" href="{{asset('files/'.App::getLocale().'/css/cook.css')}}">
    <link rel="stylesheet" href="{{asset('files/'.App::getLocale().'/css/toastr-rtl.min.css')}}">
    <script src="{{asset('files/'.App::getLocale().'/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('files/'.App::getLocale().'/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('files/'.App::getLocale().'/js/main.js')}}"></script>
    @if(isset($current) && $current == 'on_the_menu')
        <script src="{{asset('files/'.App::getLocale().'/js/on_the_menu.js')}}"></script>
    @endif


    <style>
        [v-cloak] {
            display: none;
        }
    </style>
</head>
<body>

<div id="app">

    @yield('master')

</div>

<script src="{{asset('files/'.App::getLocale().'/js/easing.min.js')}}"></script>
<script src="{{asset('files/'.App::getLocale().'/js/hoverIntent.js')}}"></script>
<script src="{{asset('files/'.App::getLocale().'/js/superfish.min.js')}}"></script>
<script src="{{asset('files/'.App::getLocale().'/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('files/'.App::getLocale().'/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('files/'.App::getLocale().'/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('files/'.App::getLocale().'/js/jquery.sticky.js')}}"></script>
<script src="{{asset('files/'.App::getLocale().'/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('files/'.App::getLocale().'/js/parallax.min.js')}}"></script>
<script src="{{asset('files/'.App::getLocale().'/js/mail-script.js')}}"></script>
<script src="{{asset('files/'.App::getLocale().'/js/toastr.min.js')}}"></script>
<script src="{{asset('files/'.App::getLocale().'/js/parsley.min.js')}}"></script>
@include('layouts.messages')
</body>

</html>
