@extends('layouts.master')

@section('content')

<price_show inline-template language="{{App::getLocale()}}" plan_id={{$planId}} meal_cost={{$meal_cost}} 
no_meals={{$no_meals}} shipping_cost={{$shipping_cost}} total_cost={{$total_cost}}>

        <!-- Step 4 -->
        <div>

            @foreach ($dates as $date)
            <div class="container">

                <div class="mb-10 row mt-25">
                    <div class="col-12">

                        <h4 style="font-size: 23px;">
                            <div>
                                {{$date['date_'.App::getLocale()]}}
                            </div>
                        </h4>

                    </div>
                </div>

            </div>

            <div class="container mt-4 mb-4 d-flex flex-row flex-wrap  p-0">
                <!-- Meal -->
            
                <div class="card mr-2 mb-2 p-0" v-for="(recipe, index) in this.recipes" v-if="recipe.date_id === {{$date->id}}">

                    <div class=" meal-image">
                        <img class="card-img" src="{{asset('files/img/meal1.jpg')}}">
                    </div>

                    <div class="card-body">

                        <div class="meal-title" v-if="language === 'ar'">
                            @{{recipe.title_ar}}
                        </div>
                        <div class="meal-title" v-else>
                            @{{recipe.title_en}}
                        </div>

                        <div class="meal-sub-title" v-if="language === 'ar'">
                            @{{recipe.subtitle_ar}}
                        </div>
                        <div class="meal-sub-title" v-else>
                            @{{recipe.subtitle_en}}
                        </div>

                    </div>

                    <div class="meal-footer justify-content-between" style="background: #fff !important;">

                        <div class="meal-time">

                            <span><i class="far fa-clock"></i></span>

                            <p class="mr-1">@{{recipe.time}} {{__('sign.min')}}</p> | &nbsp;

                            <span><i class="fas fa-fire"></i></span>

                            <p>@{{recipe.calories}}</p>

                        </div>

                        <div class="choose" @click.prevent="add(recipe.id, index)">
                            <div>
                                {{__('sign.choose')}}
                            </div>
                        </div>

                        <!-- Details link -->
                        <div class="details">
                            <a class="details" :href="'/ar/on_the_menu/'+recipe.id">
                                {{__('menu.details')}}</a>
                        </div>
                        <!-- Details link -->

                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>
    </div>

</price_show>

@endsection