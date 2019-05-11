@extends('layouts.master')

@section('content')

@include('layouts.header')

<div style="margin-top: 68px !important;">

    <cookbook inline-template>

        <div>

            <section class="search_section">
                <div class="container">
                    <form action="{{route('cookbook.search')}}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-3 mt-10 hide_mobile">
                                <h1 class="cookbook_title">{{__('cook.title')}}</h1>
                            </div>

                            <div class="col-md-8 col-sm-9">
                                <input type="text" name="search" class="search_input" placeholder="{{__('cook.search')}}" required>
                            </div>

                            <div class="col-md-1 col-sm-3">
                                <button class="search_btn">{{__('cook.go')}}</button>
                            </div>

                        </div>
                    </form>
                </div>
            </section>

            <div class="container">
                <div class="holder">
                    <div class="row">

                        <section class="col-md-3">

                            <div class="accordion_group">

                                <h2 @click="changeAccordionStatus(0)" :key="this.accordionStatus[0].down">

                                    <i v-if="this.accordionStatus[0].down === 1"
                                        class="fas fa-chevron-circle-down icon"></i>

                                    <i v-if="this.accordionStatus[0].down === 0"
                                        class="fas fa-chevron-circle-up icon"></i>

                                    {{__('cook.accordion1_title')}}

                                </h2>

                                <div v-if="this.accordionStatus[0].down === 1" class="accordion_body">

                                    <ul>

                                        @foreach ($components as $component)
                                            <li><a href="{{route('cookbook.component', $component->id)}}">{{$component['name_'.App::getLocale()]}}</a></li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>


                            <div class="accordion_group">

                                <h2 @click="changeAccordionStatus(1)" :key="this.accordionStatus[1].down">

                                    <i v-if="this.accordionStatus[1].down === 1"
                                        class="fas fa-chevron-circle-down icon"></i>

                                    <i v-if="this.accordionStatus[1].down === 0"
                                        class="fas fa-chevron-circle-up icon"></i>

                                    {{__('cook.accordion2_title')}}

                                </h2>

                                <div v-if="this.accordionStatus[1].down === 1" class="accordion_body">

                                    <ul>

                                        @foreach ($dishes as $dish)
                                        <li><a href="{{route('cookbook.dish', $dish->id)}}">{{$dish['name_'.App::getLocale()]}}</a></li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>


                            <div class="accordion_group">

                                <h2 @click="changeAccordionStatus(2)" :key="this.accordionStatus[2].down">

                                    <i v-if="this.accordionStatus[2].down === 1"
                                        class="fas fa-chevron-circle-down icon"></i>

                                    <i v-if="this.accordionStatus[2].down === 0"
                                        class="fas fa-chevron-circle-up icon"></i>

                                    {{__('cook.accordion3_title')}}

                                </h2>

                                <div v-if="this.accordionStatus[2].down === 1" class="accordion_body">

                                    <ul>

                                        @foreach ($seasons as $season)
                                        <li><a href="{{route('cookbook.season', $season->id)}}">{{$season['name_'.App::getLocale()]}}</a></li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                            <div class="btn_container">
                                <a href="#" class="filter_btn">{{__('cook.get_cooking')}}</a>
                            </div>

                        </section>
                        <!-- قائمة الوصفات -->
                        <section class="col-md-9">

                            <!-- Meal -->
                            <div class="row mb-15">

                                @foreach ($recipes as $recipe)
                                <div class="col-md-4 recipe_container" style="margin-bottom: 10px;">
                                    <a class="recipe_link" href="{{url('/'.App::getLocale().'/on_the_menu/'.$recipe->id)}}">
                                        <div class="recipe_image_link">
                                            <img src="{{asset('uploads/'.$recipe->picture)}}" class="img-fluid">
                                        </div>
                                        <h3>{{$recipe['title_'.App::getLocale()]}}</h3>
                                        <h4>{{$recipe['subtitle_'.App::getLocale()]}}</h4>
                                    </a>
                                </div>
                                @endforeach

                            </div>
                            <!-- Meal -->


                        </section>
                        <!-- قائمة الوصفات -->
                    </div>
                </div>
            </div>

        </div>

    </cookbook>

</div>

@include('layouts.footer')

@endsection