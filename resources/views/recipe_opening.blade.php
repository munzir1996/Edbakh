@extends('layouts.master')

@section('content')

    @include('layouts.header')

    <div style="margin-top: 68px !important;background: #fdfcfa;">

        <div class="recipe_top_pic_container col-12">

            <img src="{{asset('uploads/'.$recipe->picture)}}" class="recipe_top_pic">

        </div>

        <div class="container recipe_page_main_container">

            <section class="recipe_top_section_tow row">

                <div class="col-12 row" style="border-bottom: solid 1px #f7f6f4; padding-bottom: 30px;">

                    <div class="col-md-8">

                        <div class="recipe_title_container">

                            <h1 class="recipe_title">{{$recipe['title_'.App::getLocale()]}}</h1>

                            <h2 class="recipe_sub_title mt-10">{{$recipe['subtitle_'.App::getLocale()]}}</h2>

                        </div>

                    </div>

                    <div class="col-md-4 text-right" style="">

                        <recipe_reaction language="{{App::getLocale()}}" recipe_id="{{$recipe->id}}">
                        </recipe_reaction>

                    </div>

                </div>

                <div class="col-12 row mt-3">

                    <div class="col-md-8 recipe_top_text_container">

                        <div>

                            <p>

                                {{strip_tags($recipe['description_'.App::getLocale()])}}

                            </p>

                        </div>

                        <div>

                            <span class="recipe_top_text_title">{{__('anrecipe.tags')}} :</span>

                            @foreach ($recipe->tags as $tag)
                            <div class="recipe_tool_name_container">
                                
                                <span class="dot mr-5">•</span>
                                
                                <span class="name">{{$tag['name_'.App::getLocale()]}}</span>
                                
                            </div>
                            @endforeach

                        </div>

                    </div>

                    <div class="col-md-4 pl-sm-5 pr-sm-5 row pt-2">

                        <div class="col-12 row justify-content-between">

                            <span class="recipe_top_text_title">{{__('anrecipe.time')}}</span>

                            <span class="recipe_value">{{$recipe->time}} {{__('anrecipe.time_value')}}</span>

                        </div>

                        <div class="col-12 row justify-content-between">

                            <span class="recipe_top_text_title">{{__('anrecipe.cooking_difficulty')}}</span>

                            <span class="recipe_value">{{__('anrecipe.level')}} {{$recipe->level}}</span>

                        </div>

                    </div>

                </div>

            </section>


            <section class="row mt-3 justify-content-between">

                <recipe_ingredients inline-template>

                    <div class="col-md-8 recipe_ingredients_section_tow">

                        <div class="recipe_ingredients_title_area row">

                            <div class="recipe_ingredients_title">

                                {{__('anrecipe.ingredients')}}

                            </div>

                        </div>

                        <div class="recipe_amount_number">

                            <button @click="changeServe(1)" :class="{'recipe_amount_btn_active': this.serve == 1}" class="recipe_amount_btn {{App::isLocale('en')? 'border_top_right_zero border-bottom_right_zero': 'border_top_left_zero border_bottom_left_zero'}}">2</button>

                            <button @click="changeServe(2)" :class="{'recipe_amount_btn_active': this.serve == 2}" class="recipe_amount_btn {{App::isLocale('en')? 'border_top_left_zero border_bottom_left_zero': 'border_top_right_zero border-bottom_right_zero'}}">4</button>

                        </div>

                        <div class="col-12 row">

                            @foreach ($recipe->contains as $contain)
                            <div class="recipe_an_ingredient_container col-12 col-sm-6">
                                
                                <div class="recipe_an_ingredient_img_container_1">
                                    <div class="recipe_an_ingredient_img_container_2">
                                        
                                        <img src="{{asset('uploads/'.$contain->picture)}}" class="recipe_an_ingredient_img">
                                        
                                    </div>
                                </div>
                                
                                <div class="recipe_an_ingredient_text_container">
                                    
                                    <p>@{{2 * this.serve}} {{$contain['weight_'.App::getLocale()]}}</p>
                                    
                                    <p>{{$contain['name_'.App::getLocale()]}}</p>
                                    
                                </div>
                                
                            </div>
                            @endforeach

                        </div>


                    </div>

                </recipe_ingredients>

                <div class="col-md-4 recipe_natural_section_tow row pb-5">

                    <div class="justify-content-between col-12 mb-4">
                        <span class="nutrition_title">{{__('anrecipe.nutrition_values')}}</span>
                        <span class="nutrition_value_title {{App::isLocale('en')? 'float-right': 'float-left'}}">{{__('anrecipe.per_serving')}}</span>
                    </div>

                    <div class="justify-content-between col-12 mb-3">
                        <span class="nutrition_name">{{__('anrecipe.nutrition1')}}</span>
                        <span class="nutrition_value {{App::isLocale('en')? 'float-right': 'float-left'}}">{{__('anrecipe.nutrition1_value')}}</span>
                    </div>

                    <div class="justify-content-between col-12 mb-3">
                        <span class="nutrition_name">{{__('anrecipe.nutrition2')}}</span>
                        <span class="nutrition_value {{App::isLocale('en')? 'float-right': 'float-left'}}">{{$recipe->calories}} {{__('anrecipe.nutrition2_value')}}</span>
                    </div>

                    @foreach ($recipe->nutritions as $nutrition)
                        
                    <div class="justify-content-between col-12 mb-3">
                        <span class="nutrition_name">{{__('anrecipe.nutrition3')}}</span>
                        <span class="nutrition_value {{App::isLocale('en')? 'float-right': 'float-left'}}">{{$nutrition->fats}} {{__('anrecipe.nutrition3_value')}}</span>
                    </div>

                    <div class="justify-content-between col-12 mb-3">
                        <span class="nutrition_name">{{__('anrecipe.nutrition4')}}</span>
                        <span class="nutrition_value {{App::isLocale('en')? 'float-right': 'float-left'}}">{{$nutrition->saturated_fats}} {{__('anrecipe.nutrition4_value')}}</span>
                    </div>

                    <div class="justify-content-between col-12 mb-3">
                        <span class="nutrition_name">{{__('anrecipe.nutrition5')}}</span>
                        <span class="nutrition_value {{App::isLocale('en')? 'float-right': 'float-left'}}">{{$nutrition->carbohydrate}} {{__('anrecipe.nutrition5_value')}}</span>
                    </div>

                    <div class="justify-content-between col-12 mb-3">
                        <span class="nutrition_name">{{__('anrecipe.nutrition6')}}</span>
                        <span class="nutrition_value {{App::isLocale('en')? 'float-right': 'float-left'}}">{{$nutrition->Sugar}} {{__('anrecipe.nutrition6_value')}}</span>
                    </div>

                    <div class="justify-content-between col-12 mb-3">
                        <span class="nutrition_name">{{__('anrecipe.nutrition7')}}</span>
                        <span class="nutrition_value {{App::isLocale('en')? 'float-right': 'float-left'}}">{{$nutrition->dietary_fiber}} {{__('anrecipe.nutrition7_value')}}</span>
                    </div>

                    <div class="justify-content-between col-12 mb-3">
                        <span class="nutrition_name">{{__('anrecipe.nutrition8')}}</span>
                        <span class="nutrition_value {{App::isLocale('en')? 'float-right': 'float-left'}}">{{$nutrition->protein}} {{__('anrecipe.nutrition8_value')}}<span>
                    </div>

                    <div class="justify-content-between col-12 mb-3">
                        <span class="nutrition_name">{{__('anrecipe.nutrition9')}}</span>
                        <span class="nutrition_value {{App::isLocale('en')? 'float-right': 'float-left'}}">{{$nutrition->cholestrol}} {{__('anrecipe.nutrition9_value')}}</span>
                    </div>

                    <div class="justify-content-between col-12">
                        <span class="nutrition_name">{{__('anrecipe.nutrition10')}}</span>
                        <span class="nutrition_value {{App::isLocale('en')? 'float-right': 'float-left'}}">{{$nutrition->sodium}} {{__('anrecipe.nutrition10_value')}}</span>
                    </div>
                    @endforeach
                </div>

            </section>

            <section class="recipe_tools_section row">

                <h3 class="recipe_tools_title col-12 mt-3">{{__('anrecipe.utensils')}}</h3>

                <div>

                    @foreach ($recipe->puts as $put)
                    <div class="recipe_tool_name_container">
                        
                        <span class="dot mr-5">•</span>
                        
                        <span class="name">{{$put['name_'.App::getLocale()]}}</span>
                        
                    </div>
                    @endforeach

                </div>

            </section>

            <section class="recipe_instruction_section row">

                <div class="col-12 row mb-4">

                    <h1 class="col-8 instruction_title">{{__('anrecipe.instructions')}}</h1>

                    <div class="col-4 text-right instruction_download">

                        <i class="fas fa-arrow-down mr-1 download_btn"></i>

                        PDF

                    </div>

                </div>

                @foreach ($recipe->instructions as $instruction)
                <div class="recipe_step_container col-12 row">
                    
                    <div class="col-md-4 p-0 instructions_img_container">
                        
                        <img src="{{asset('uploads/'.$instruction->picture)}}" class="instructions_img">
                        
                    </div>
                    
                    <div class="col-md-7 instruction_description_container">
                        
                        <div class="instruction_description" style="border: none !important;">

                                <div style="display: inline-block"><div class="instruction_number">{{$instruction->step}}</div> 
                                <span class="instruction_step_title">{{$instruction['title_'.App::getLocale()]}}:</span></div>

                            <div style="margin-top: 20px">

                                <p class="instruction_word">
                                    
                                        {{strip_tags($instruction['description_'.App::getLocale()])}}                                    
                                </p>
                                
                            </div>

                        </div>
                        
                    </div>
                    
                </div>
                @endforeach
                
                
            </section>

        </div>


    </div>

    @include('layouts.footer')

@endsection