@extends('layouts.master')

@section('content')

@include('layouts.header')

<main style="margin-top: 68px !important;">

    <div class="container">

        <section class="how_it_work_top_section">

            <img src="{{asset('files/img/how_it_work_top_section.png')}}" alt="top">

            <h1>{{__('how.top_title')}}</h1>

            <h2>{{__('how.second_title')}}</h2>

        </section>

        {{--step1--}}
        <section class="row how_it_work_step_section">

            <div class="col-lg-6 col-md-12 text-center">

                <img src="{{asset('files/img/how_it_work_step1.png')}}" alt="">

            </div>

            <div class="col-lg-6 col-md-12"
                style="{{App::isLocale('en')? 'padding: 12% 1% 0 8% !important;' : 'padding: 12% 2% 0px 2% !important;'}}">

                <h1>{{__('how.step1_title')}}</h1>

                <p>{{__('how.step1_text')}}</p>

                <how_it_work_modal btn="{{__('global.learn_more')}}">

                    <div class="container row">

                        <div class="col-md-5 col-sm-12 text-center m-auto how_it_work_modal_item">

                            <div>

                                <img src="{{asset('files/img/modal_message.png')}}">

                            </div>

                            <h2>{{__('how.modal1_title')}}</h2>

                            <p>{{__('how.modal1_text')}}</p>

                        </div>

                    </div>

                    <div class="how_it_work_btn_container">

                        <a href="{{url('/'.App::getLocale().'/pricing')}}" class="btn_blue">{{__('global.start')}}</a>

                    </div>

                </how_it_work_modal>

            </div>

        </section>
        {{--end of step1--}}

        {{--step2--}}
        <section class="row how_it_work_step_section">

            <div class="col-lg-6 col-md-12 text-center">

                <img src="{{asset('files/img/how_it_work_step2.png')}}" alt="">

            </div>

            <div class="col-lg-6 col-md-12"
                style="{{App::isLocale('en')? 'padding: 12% 1% 0 8% !important;' : 'padding: 12% 2% 0px 2% !important;'}}">

                <h1>{{__('how.step2_title')}}</h1>

                <p>{{__('how.step2_text')}}</p>

                {{--<a href="#">Learn More</a>--}}

            </div>

        </section>
        {{--end of step2--}}

        {{--step3--}}
        <section class="row how_it_work_step_section">

            <div class="col-lg-6 col-md-12 text-center">

                <img src="{{asset('files/img/how_it_work_step3.png')}}" alt="">

            </div>

            <div class="col-lg-6 col-md-12"
                style="{{App::isLocale('en')? 'padding: 12% 1% 0 8% !important;' : 'padding: 12% 2% 0px 2% !important;'}}">

                <h1>{{__('how.step3_title')}}</h1>

                <p>{{__('how.step3_text')}}</p>

                <how_it_work_modal btn="{{__('global.learn_more')}}">

                    <div class="container row">

                        <div class="col-md-5 col-sm-12 text-center m-auto how_it_work_modal_item">

                            <div>

                                <img src="{{asset('files/img/modal_keep_cool.png')}}">

                            </div>

                            <h2>{{__('how.modal2_title')}}</h2>

                            <p>{{__('how.modal2_text')}}</p>

                        </div>

                    </div>

                    <div class="how_it_work_btn_container">

                        <a href="{{url('/'.App::getLocale().'/pricing')}}" class="btn_blue">{{__('global.start')}}</a>

                    </div>

                </how_it_work_modal>

            </div>

        </section>
        {{--end of step3--}}

        {{--step4--}}
        <section class="row how_it_work_step_section">

            <div class="col-lg-6 col-md-12 text-center">

                <img src="{{asset('files/img/how_it_work_step4.png')}}" alt="">

            </div>

            <div class="col-lg-6 col-md-12"
                style="{{App::isLocale('en')? 'padding: 12% 1% 0 8% !important;' : 'padding: 12% 2% 0px 2% !important;'}}">

                <h1>{{__('how.step4_title')}}</h1>

                <p>{{__('how.step4_text')}}</p>

                <how_it_work_modal btn="{{__('global.learn_more')}}">

                    <div class="container row text-center">

                        <div class="col-md col-sm-12 text-center m-auto how_it_work_modal_item">

                            <div class="text-center">

                                <img src="{{asset('files/img/modal_flex_plan.png')}}">

                            </div>

                            <h2>{{__('how.modal3_title1')}}</h2>

                            <p>{{__('how.modal3_text1')}}</p>

                        </div>


                        <div class="col-md col-sm-12 text-center m-auto how_it_work_modal_item">

                            <div>

                                <img src="{{asset('files/img/modal_options.png')}}">

                            </div>

                            <h2>{{__('how.modal3_title2')}}</h2>

                            <p>{{__('how.modal3_text2')}}</p>

                        </div>

                        {{--<div class="col-md col-sm-12 text-center m-auto how_it_work_modal_item">

                                <div>

                                    <img src="{{asset('files/img/modal_variaty.png')}}">

                    </div>

                    <h2>Recipe Variety</h2>

                    <p>We have a broad menu, with easy 20-minute meals and more challenging recipes.</p>

            </div>--}}


    </div>

    <div class="how_it_work_btn_container">

        <a href="{{url('/'.App::getLocale().'/pricing')}}" class="btn_blue">{{__('global.start')}}</a>

    </div>

    </how_it_work_modal>

    </div>

    </section>
    {{--end of step4--}}

    {{--step5--}}
    <section class="row how_it_work_step_section">

        <div class="col-lg-6 col-md-12 text-center">

            <img src="{{asset('files/img/how_it_work_step5.png')}}" alt="">

        </div>

        <div class="col-lg-6 col-md-12"
            style="{{App::isLocale('en')? 'padding: 12% 1% 0 8% !important;' : 'padding: 12% 2% 0px 2% !important;'}}">

            <h1>{{__('how.step5_title')}}</h1>

            <p>{{__('how.step5_text')}}</p>

            {{--<a href="#">Learn More</a>--}}

        </div>

    </section>
    {{--end of step5--}}

    </div>

    <div class="how_it_work_try_section_container">
        <!-- Get Start -->
        <section class="how_it_work_try_section">

            <div class="container row m-auto text-center">

                <div class="col-lg-4 col-md-8 how_it_work_try_section_content m-auto">

                    <img src="{{asset('files/img/try_header_img.png')}}" alt="">

                    <h1>{{__('how.bottom_try')}}</h1>

                    <h2>{{__('how.bottom_no')}}</h2>

                    <p>{{__('how.bottom_start')}}</p>

                    <a href="{{url('/'.App::getLocale().'/pricing')}}">{{__('global.start')}}</a>

                </div>

            </div>

        </section>
        <!-- Get Start -->
    </div>

    <section class="how_it_work_contact_section">

        <div class="container row m-auto" style="padding-right: 50px; padding-left: 50px;">

            <div class="col-md-6 col-sm-12 how_it_work_contact_question_side">

                <h1 class="how_it_work_contact_title">{{__('how.question_title')}}</h1>
                <!-- Questions -->

                <ul>
                    @foreach ($faqs as $faq)
                        <question question="{{$faq['title_'.App::getLocale()]}}" 
                        answer="{{strip_tags($faq['content_'.App::getLocale()])}}">
                        </question>
                    @endforeach
                    
                    {{-- <li><a href="#"></a>{{__('how.question4')}}</li> --}}
                </ul>

                <!-- Questions -->
                <!-- FAQ -->
                <a href="{{url('/'.App::getLocale().'/faq')}}" class="all_fqas">{{__('how.faqs')}}</a>
                <!-- FAQ -->
            </div>

            <div class="col-md-5 col-sm-12 ml-auto">

                <h1 class="how_it_work_contact_title">{{__('how.contact_us')}}</h1>

                <div class="how_it_work_contact_item">

                    <i class="fas fa-phone fa-flip-horizontal"
                        style="color: #4AA047 !important; font-size: 20px !important;"></i>&nbsp;&nbsp;

                    <a href="tel:{{$setting->phone}}">{{$setting->phone}}</a>

                </div>

                <div class="how_it_work_contact_item">

                    <i class="fas fa-envelope"
                        style="color: #4AA047 !important; font-size: 20px !important;"></i>&nbsp;&nbsp;

                    <a href="mailto:{{$setting->email}}">{{$setting->email}}</a>

                </div>

            </div>

        </div>

    </section>

</main>

@include('layouts.footer')

@endsection