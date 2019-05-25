@extends('layouts.master')

@section('content')

    @include('layouts.header')

    <div style="margin-top: 68px !important;">

        <section class="banner-area relative">
            <div class="container">
                <div class="row fullscreen d-flex align-items-center justify-content-start">
                    <div class="banner-content m-auto col-lg-8 col-md-12">


                        <h1 class="custom-title-size">
                            {{__('main.index_show_case_title')}}
                        </h1>
<!-- أبدأ -->
                        <a href="{{url('/'.App::getLocale().'/pricing')}}" class="btn-orange radius get-cooking-btn hide" style="color: #fff !important;">{{__('main.global_start')}}</a>
<!-- أبدأ -->
                    </div>
                </div>
            </div>
        </section>


        <div class="mobile-only text-center">

            <a href="#" class="btn mobile-btn-details">{{__('main.global_start')}}</a>

        </div>

        <section>
            <div class="container mt-5">

                <div class="row">

                    <div class="col-md-6 col-sm-12 text-center">

                        <img src="{{asset('files/img/step1.PNG')}}" class="img-thumbnail" style="border: none !important;">

                    </div>

                    <div class="col-md-6 col-sm-12 text-center" style="padding-top: 50px !important;">
                        <h1 class="step-title">{{__('main.index_steps_title1')}}</h1>
                        <p class="step-text">{{__('main.index_steps_desc1')}}</p>
                    </div>


                </div>

                <div class="row" style="{{App::isLocale('en')? 'direction: rtl !important;': 'direction: ltr !important;'}}">

                    <div class="col-md-6 col-sm-12 text-center" style="">

                        <img src="{{asset('files/img/step2.PNG')}}" class="img-thumbnail" style="border: none !important;">

                    </div>

                    <div class="col-md-6 col-sm-12 text-center" style="padding-top: 50px !important;">
                        <h1 class="step-title">{{__('main.index_steps_title2')}}</h1>
                        <p class="step-text">{{__('main.index_steps_desc2')}}</p>
                    </div>


                </div>

                <div class="row">

                    <div class="col-md-6 col-sm-12 text-center">

                        <img src="{{asset('files/img/step3.PNG')}}" class="img-thumbnail" style="border: none !important;">

                    </div>

                    <div class="col-md-6 col-sm-12 text-center" style="padding-top: 50px !important;">
                        <h1 class="step-title">{{__('main.index_steps_title3')}}</h1>
                        <p class="step-text">{{__('main.index_steps_desc3')}}</p>
                    </div>


                </div>

            </div>
        </section>

        <section class="in-box-area relative">
            <div class="container pt-5 pb-5">
                <div class="row">

                    <div class="col-md-6 m-auto in-box-panel">

                        <h3 class="text-center in-box-title m-auto">{{__('main.index_inside_box_title')}}</h3>

                        <ul>
                            <li><i class="fas fa-plus in-box-list-icon"></i>{{__('main.index_inside_box_text1')}}</li>
                            <li><i class="fas fa-plus in-box-list-icon"></i>{{__('main.index_inside_box_text2')}}</li>
                            <li><i class="fas fa-plus in-box-list-icon"></i>{{__('main.index_inside_box_text3')}}</li>
                            <li><i class="fas fa-plus in-box-list-icon"></i>{{__('main.index_inside_box_text4')}}</li>
                        </ul>
<!-- اختر خطتك 1 -->
                        <div class="text-center">
                            <a href="{{url('/'.App::getLocale().'/pricing')}}" class="in-box-btn">{{__('main.global_choose_plan')}}</a>
                        </div>
<!-- اختر خطتك 1 -->
                    </div>

                </div>
            </div>
        </section>



        <section class="start-price-panel">
            <div class="container text-center">

                <img src="{{asset('files/img/box.png')}}">

                <div class="start-price-title">

                    {{__('main.index_starting_price')}}

                </div>

                <div class="start-price-text">

                    {{__('main.index_no_commitment')}}

                </div>
<!-- أختر خطتك 2 -->
                <a href="{{url('/'.App::getLocale().'/pricing')}}" class="start-price-btn">{{__('main.global_choose_plan')}}</a>
<!-- أختر خطتك 2 -->
            </div>
        </section>

    </div>

    @include('layouts.footer')

@endsection