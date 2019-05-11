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

                                <form class="login_form">

                                    <div class="form-group">
                                        <label class="login_form_label">{{__('login.email')}}</label>
                                        <input type="email" class="login_form_input">
                                    </div>

                                    <div class="form-group">
                                        <label class="login_form_label">{{__('login.password')}}</label>
                                        <input type="password" class="login_form_input">
                                    </div>

                                    <div class="form-group mb-10 text-center">
                                        <a href="#">{{__('login.forget_password')}}</a>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 30px;">
                                        <button class="login_btn">{{__('login.login')}}</button>
                                    </div>

                                    <hr>

                                </form>

                                <div class="login_sign_up">

                                    {{__('login.new_account')}}

                                    <a href="#">{{__('login.sign_up')}}</a>

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