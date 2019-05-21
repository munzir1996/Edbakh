@extends('layouts.master')

@section('content')

@include('layouts.header')

<div style="margin-top: 68px !important; background: #FAFBFD !important;">

    <div class="container">
        <div style="padding: 30px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-5 col-lg-5 m-auto">
                        <div class="login_container">

                            <h1 class="login_title">{{__('login.login')}}</h1>

                            <form method="POST" action="{{ route('login') }}" class="login_form">
                                @csrf
                                <div class="form-group">
                                    <label class="login_form_label">{{__('login.phone')}}</label>
                                    <input type="phone" name="phone"
                                        class="login_form_input{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                        value="{{ old('phone') }}" required autofocus>
                                    @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="login_form_label">{{__('login.password')}}</label>
                                    <input type="password" name="password"
                                        class="login_form_input{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                {{-- <div class="form-group mb-10 text-center">
                                        <a href="#">{{__('login.forget_password')}}</a>
                        </div> --}}

                        <div class="form-group" style="margin-bottom: 30px;">
                            <button type="submit" class="login_btn">{{__('login.login')}}</button>
                        </div>

                        <hr>

                        </form>

                        <div class="login_sign_up">

                            {{__('login.new_account')}}

                            <a href="{{url('/'.App::getLocale().'/sign_up')}}">{{__('login.sign_up')}}</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

@include('layouts.footer')

@endsection