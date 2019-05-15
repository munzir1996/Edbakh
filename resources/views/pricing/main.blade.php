@extends('layouts.master')

@section('content')

@include('layouts.header')

<div style="margin-top: 68px !important;">

    <section style="margin: 100px auto 70px auto !important;">

        @if(session()->has('message'))

        <p class="alert alert-success">{{session()->get('message')}}</p>

    @endif
    <br>
        <h1 align="center">{{$setting['price_title_'.App::getLocale()]}}</h1> 
        <p align="center">{{$setting['price_subtitle_'.App::getLocale()]}}</p>
    
    <div class="container row m-auto">
            @foreach($plans as $plan)

            <recipe_plan inline-template serving="{{$plan->price_per_serve}}" week="{{$plan->weeks[0]->week}}"
                shipping="{{$plan->weeks[0]->shipping_cost}}" language="{{App::getLocale()}}">

                <div class="col-md-5 col-sm-12 mb-5 ml-auto mr-auto"
                    style="padding-right: 0 !important; padding-left: 0 !important;">

                    <div class="pricing_plan">

                        <div class="card-header pricing_plan_header" style="background: #fff !important;">

                            <h3 class="pricing_plan_title">{{$plan['title_'.App::getLocale()]}}</h3>

                            <p class="pricing_plan_text">{{__('pricing.serve')}} {{$plan->serve}}</p>

                        </div>

                        <div class="plan_image">
                            <img src="{{asset('uploads/'.$plan->image)}}" width="100%" height="100%">
                        </div>

                        <p class="plan_description_text">

                            {{strip_tags($plan['description_'.App::getLocale()])}}

                        </p>

                        <div>

                            <div class="plan_quantity_selector">

                                <fieldset class="plan_quantity_selector_inputs">

                                    @foreach($plan->weeks as $week)

                                    <legend class="plan_quantity_selector_legend">{{$week->week}}</legend>

                                    <input id="{{$plan['title_en'].$week->week}}" 
                                    @click="setPerWeek({{$week->week}}, {{$week->shipping_cost}})"
                                        name="{{$plan['title_en'].'per_week_option'}}" type="radio"
                                        class="plan_quantity_selector_radio" @if($plan->weeks[0] == $week) checked
                                    @endif>

                                    <label for="{{$plan['title_en'].$week->week}}" class="plan_quantity_selector_label">
                                        <span>{{$week->week}}</span>
                                    </label>

                                    @endforeach

                                </fieldset>

                                <p class="plan_quantity_selector_text">{{__('pricing.tow_person_per_week')}}</p>

                            </div>

                            <div class="plan_pricing">

                                <p class="plan_pricing_price">

                                    <span class="plan_pricing_item">{{$plan->price_per_serve}} <br>
                                        {{__('pricing.currency')}}</span>

                                    <span class="plan_pricing_description">{{__('pricing.tow_person_per_week')}}</span>

                                </p>

                                <p class="plan_pricing_price">

                                    <span class="plan_pricing_item">@{{this.shippingCost}}<br>
                                        {{__('pricing.currency')}}</span>

                                    <span class="plan_pricing_description">{{__('pricing.tow_person_shipping')}}</span>

                                </p>

                                <p class="plan_pricing_price">

                                    <span class="plan_pricing_item">@{{this.total}}<br>
                                        {{__('pricing.currency')}}</span>

                                    <span class="plan_pricing_description">{{__('pricing.tow_person_total1')}}</span>

                                    <span class="plan_pricing_description">{{__('pricing.tow_person_total2')}}</span>

                                </p>

                            </div>
                            {{-- <form action="{{route('pricing.store')}}" method="post"> --}}
                                @csrf
                                <div class="plan_button">

                                    <button class="plan_button_content"
                                        @click="subscribe({{$plan->id}})">{{__('pricing.select_btn')}}
                                    </button>
                                </div>
                            {{-- </form> --}}

                        </div>

                    </div>

                </div>

            </recipe_plan>

            @endforeach

        </div>
    </section>

    <testimonial_section locale="{{App::getLocale()}}"></testimonial_section>

    <section class="pricing_question_section">

        <div class="container">

            <h1 class="pricing_question_section_title text-center" style="font-size: 26px !important;">
                {{__('pricing.common')}}</h1>

            <div class="row">

                <div class="col-sm-6 col-md-5 col-md-push-1 ml-auto">

                    <div class="pricing_question_section_faq_txt">

                        <p class="pricing_question_section_faq_txt_question">{{__('pricing.question1')}}</p>

                        <p class="pricing_question_section_txt">
                            {{__('pricing.answer1')}}
                        </p>

                        <p class="pricing_question_section_faq_txt_question">{{__('pricing.question2')}}</p>

                        <p class="pricing_question_section_txt">
                            {{__('pricing.answer2')}}
                        </p>

                        <p class="pricing_question_section_faq_txt_question">{{__('pricing.question3')}}</p>

                        <p class="pricing_question_section_txt">
                            {{__('pricing.answer3')}}
                        </p>

                    </div>

                </div>

                <div class="col-sm-6 col-md-5 col-md-push-1 mr-auto">

                    <div class="pricing_question_section_faq_txt">

                        <p class="pricing_question_section_faq_txt_question">{{__('pricing.question4')}}</p>

                        <p class="pricing_question_section_txt">
                            {{__('pricing.answer4')}}
                        </p>

                        <p class="pricing_question_section_faq_txt_question">{{__('pricing.question5')}}</p>

                        <p class="pricing_question_section_txt">
                            {{__('pricing.answer5')}}
                        </p>

                        <p class="pricing_question_section_faq_txt_question">{{__('pricing.question6')}}</p>

                        <p class="pricing_question_section_txt">
                            {{__('pricing.answer6')}}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@include('layouts.footer')

@endsection
<script>
    import Recipe_plan from "../../js/components/recipe_plan";
    export default {
        components: {
            Recipe_plan
        }
    }
</script>