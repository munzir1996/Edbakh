<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Edbakh | Cpanel Login</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('files/img/favicon2.png')}}"/>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('public/admin/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/admin/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('public/admin/plugins/iCheck/square/blue.css')}}">

</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Edbakh</b> Cpanel
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign In</p>

            <form method="POST" action="{{url('/admin/login')}}">

                {{csrf_field()}}

                <div class="form-group has-feedback mb">

                    <input name="email" type="email" class="form-control" placeholder="Email">

                </div>

                <div class="form-group has-feedback">

                    <input name="password" type="password" class="form-control" placeholder="Password">

                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">

                        {{$errors->first('incorrect_credentials')}}

                    </div>
                @endif

                <div class="row">

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>

                </div>

            </form>
        </div>

    </div>
</div>


<!-- jQuery -->
<script src="{{asset('public/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin/dist/js/adminlte.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('public/admin/plugins/iCheck/icheck.min.js')}}"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass   : 'iradio_square-blue',
            increaseArea : '20%' // optional
        })
    })
</script>

</body>
</html>
