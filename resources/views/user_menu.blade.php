@extends('layouts.master')

@section('content')

@include('layouts.header')

<div style="margin-top: 68px !important; background-color: #f8f9fa !important;">


    <section class="food-menu-item">

        <tabs>
            @foreach ($subscribes as $index => $plan)
            <!-- وصفات عائلية -->
            <tab name="{{$plan->plan['title_'.App::getLocale()]}}" @if ($plan->plan->id == 1) :selected="true" @endif>

                <!--week 1-->

                <div id="offset{{++$index}}"></div>

                <div id="week{{++$index}}_placeholder" class="header_placeholder"></div>
                @foreach ($dates as $date)

                <!-- foreach -->
                <meal-header id="week{{++$index}}" language="{{App::getLocale()}}"
                    btn_title="{{__('menu.get_cooking')}}" class="" title_en="{{$date->date_en}}"
                    title_ar="{{$date->date_ar}}">
                </meal-header>

                <div class="container mb-4 d-flex flex-row flex-wrap week_meals_container">
                    <!-- Meal -->
                    @foreach ($recipes as $recipe)
                    @if ($recipe->plan_id === $plan->plan->id && $recipe->date_id === $date->id)

                    <div class="card mr-2 mb-2 p-0">

                        <div class="meal-image">
                            <img class="card-img" src="{{asset('uploads/'.$recipe->picture)}}">
                        </div>

                        <div class="card-body">

                            <div class="meal-title">
                                {{$recipe['title_'.App::getLocale()]}}
                            </div>

                            <div class="meal-sub-title">
                                {{$recipe['subtitle_'.App::getLocale()]}}
                            </div>

                        </div>

                        <div class="meal-footer justify-content-between" style="background: #fff !important;">

                            <div class="meal-time">

                                <span><i class="far fa-clock"></i></span>

                                <p class="mr-1">{{$recipe->time}}{{__('menu.min')}}</p> | &nbsp;

                                <span><i class="fas fa-fire"></i></span>

                                <p>{{$recipe->calories}}</p>

                            </div>
                            <!-- Details link -->
                            <div class="details">
                                <a class="details"
                                    href="{{url('/'.App::getLocale().'/on_the_menu/'.$recipe->id)}}">{{__('menu.details')}}</a>
                            </div>
                            <!-- Details link -->
                        </div>

                    </div>
                    @endif
                    @endforeach
                    <!-- Meal -->

                </div>

                <!--week 2-->
                {{-- 
                <div id="offset2"></div>
                
                <div id="week2_placeholder" class="header_placeholder"></div> --}}

                @endforeach

            </tab>
            @endforeach


        </tabs>

        <!--<div class="header-placeholder"></div>-->



    </section>
    <!-- Get Cooking -->
    <div class="container test" style="padding-bottom: 0 !important;">

        <div class="text-center">

            <a href="{{url('/'.App::getLocale().'/cookbook')}}" class="get-cooking-menu-btn">Get Cooking</a>

        </div>

        <div class="pg-link">

            <p>Or…</p>

            <p>Want to see all our recipes? Check out our

                <a href="{{url('/'.App::getLocale().'/cookbook')}}">Cookbook</a>

            </p>

        </div>
        <!-- Get Cooking -->
    </div>

</div>

@include('layouts.footer')

@endsection