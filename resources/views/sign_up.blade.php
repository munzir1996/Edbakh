@extends('layouts.master')

@section('content')

<sign_up inline-template language="{{App::getLocale()}}">

    <div>

        <div class="registration_header">

            <div class="registration_header_content">

                <a href="" class="logo_container sign_up_logo">
                    <img src="{{asset('files/img/logo_'.App::getLocale().'.png')}}" width="100%">
                </a>
                <!-- الخطوات -->
                <ul class="steps">
                    <button class="btn btn-link" style="color: #4aa047" :disabled="this.$root.step != 1">
                        <li :class="{active: this.$root.step === 1}">

                            <span class="step_number">1</span>

                            <span class="step_text">{{__('sign.welcome')}}</span>

                        </li>
                    </button>
                    <button class="btn btn-link" style="color: #4aa047" :disabled="this.$root.step != 2">
                        <li :class="{active: this.$root.step === 2}">

                            <span class="step_number">2</span>

                            <span class="step_text">{{__('sign.plans')}}</span>

                        </li>
                    </button>
                    <button class="btn btn-link" style="color: #4aa047" :disabled="this.$root.step != 3">

                        <li :class="{active: this.$root.step === 3}">

                            <span class="step_number">3</span>

                            <span class="step_text">{{__('sign.checkout')}}</span>

                        </li>
                    </button>
                    <button class="btn btn-link" style="color: #4aa047" :disabled="this.$root.step != 4">
                        <li :class="{active: this.$root.step === 4}">

                            <span class="step_number">4</span>

                            <span class="step_text">{{__('sign.choose_meals')}}</span>

                        </li>
                    </button>
                </ul>
                <!-- الخطوات -->
            </div>

        </div>


        <div class="coupon_panel" v-if="this.$root.step === 3">{{__('sign.step3_top_text')}}</div>

        <!-- Step 1 -->
        <div class="container" v-if="this.$root.step === 1" style="margin-bottom: 92px">

            <div class="sign_up_title">

                <h1 class="title">{{__('sign.start')}}</h1>

                <h2 class="sub_title">{{__('sign.start_text')}}</h2>

            </div>

            <div class="row">

                <div class="col-sm-6 order-sm-2 col-md-4 {{App::isLocale('en')? 'mr-auto': 'ml-auto'}}">
                    <form>

                        <ul class="alert alert-danger" role="alert" v-if="errors.length" v-cloak>
                            <li v-for="error in errors">
                                <strong v-if="language === 'ar'">خطأ:</strong> <p v-text="error"></p>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="text" class="sign_up_label">{{__('sign.email')}}</label>
                                <input id="phone" type="phone" v-model="phone" class="sign_up_input">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="password" class="sign_up_label">{{__('sign.password')}}</label>
                                <input id="password" type="password" class="sign_up_input" v-model="password">
                            </div>
                        </div>

                        {{-- <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="zip" class="sign_up_label">Zip</label>
                                    <input id="zip" type="text" class="sign_up_input">
                                </div>
                            </div> --}}

                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button @click.prevent="next()" class="sign_up_btn">{{__('sign.continue')}}</button>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <div class="sign_up_doc">
                                    {{__('sign.term1')}}
                                    <a href="#">{{__('sign.term2')}}</a>
                                    {{__('sign.term3')}}
                                    <a href="#">{{__('sign.policy')}}</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <div
                    class="col-sm-6 order-md-1 col-sm-4 {{App::isLocale('en')? 'text-right': 'text-left'}} pr-0 m-auto {{App::isLocale('en')? 'ml-sm-auto': 'mr-sm-auto'}} sign_up_img_container">

                    <img src="{{asset('files/img/sign_up_img.jpg')}}" class="sign_up_img">

                </div>

            </div>

        </div>
        <!-- Step 1 -->
        <!-- Step 2 -->
        <div class="container row m-auto" v-if="this.$root.step === 2" style="margin-top: 20px !important;">

            @foreach ($plans as $plan)

            <div class="col-md-5 col-sm-12 mb-5 ml-auto mr-auto"
                style="padding-right: 0 !important; padding-left: 0 !important;">

                <sign_up_plan inline-template serving="{{$plan->price_per_serve}}" week="{{$plan->weeks[0]->week}}"
                    shipping="{{$plan->weeks[0]->shipping_cost}}" language="{{App::getLocale()}}"
                    title="{{$plan['title_'.App::getLocale()]}}" serve="{{$plan->serve}}">

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

                            <div class="plan_button">

                                <button @click.prevent="subscribe({{$plan->id}})" class="plan_button_content">
                                    {{__('pricing.select_btn')}}
                                </button>

                            </div>

                        </div>

                    </div>

                </sign_up_plan>

            </div>


            @endforeach


        </div>
        <!-- Step 2 -->
        <!-- Step 3 -->
        <div class="checkout_container" v-if="this.$root.step === 3">
            <div class="container">
                <div class="row">

                    <div class="col-xs-8 col-lg-8 ml-auto">
                        <form>
                            <div class="mb-30">

                                <ul class="alert alert-danger" role="alert" v-if="errors.length" v-cloak>
                                    <strong>خطأ:</strong>

                                    <li v-for="error in errors">
                                        <span v-text="error"></span>
                                    </li>
                                </ul>

                                <div class="mb-10 row">
                                    <div class="col-md-12">
                                        <h4>{{__('sign.information')}}</h4>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-lg-5">
                                        <label class="checkout_label">{{__('sign.first')}}</label>
                                        <input type="text" name="first_name" v-model="first_name" class="checkout_input"
                                            required>
                                    </div>

                                    <div class="form-group col-lg-5">
                                        <label class="checkout_label">{{__('sign.last')}}</label>
                                        <input type="text" name="last_name" v-model="last_name" class="checkout_input"
                                            required>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-lg-10">
                                        <label class="checkout_label">{{__('sign.address')}}</label>
                                        <input type="text" name="address" v-model="address" class="checkout_input"
                                            required>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-lg-6">
                                        <label class="checkout_label">{{__('sign.city')}}</label>
                                        <select v-model="city_id" name="city_id" class="form-control">
                                            <option></option>
                                            @foreach($cities as $city)
                                            <option value="{{$city->id}}">
                                                {{$city['name_'.App::getLocale()]}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                            </div>

                            <div>

                                <div class="row mb-10">
                                    <div class="col-sm-12">
                                        <h4>{{__('sign.billing')}}</h4>
                                    </div>
                                </div>

                                <div class="row mb-10">

                                    <div class="form-group col-lg-5">
                                        <label class="checkout_label">{{__('sign.card_number')}}</label>
                                        <input type="text" class="checkout_input" v-model="cardNumber">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label class="checkout_label">{{__('sign.security')}}</label>
                                        <input type="text" class="checkout_input" v-model="security">
                                    </div>

                                </div>

                                <div class="row mb-10">
                                    <div class="form-group col-lg-12">
                                        <label class="checkout_label">{{__('sign.expiration')}}</label>

                                        <!--<input  type="text" class="checkout_input">-->

                                        <select name="" class="gifts_email_input"
                                            style="width: 75px !important; display: inline-block !important;">

                                            <option value="">2018</option>
                                            <option value="">2019</option>

                                        </select>

                                        <select name="" class="gifts_email_input"
                                            style="width: 95px !important; display: inline-block !important;">

                                            <option value="">{{__('gifts.January')}}</option>
                                            <option value="">{{__('gifts.February')}}</option>
                                            <option value="">{{__('gifts.March')}}</option>
                                            <option value="">{{__('gifts.April')}}</option>
                                            <option value="">{{__('gifts.May')}}</option>
                                            <option value="">{{__('gifts.June')}}</option>
                                            <option value="">{{__('gifts.July')}}</option>
                                            <option value="">{{__('gifts.August')}}</option>
                                            <option value="">{{__('gifts.September')}}</option>
                                            <option value="">{{__('gifts.October')}}</option>
                                            <option value="">{{__('gifts.November')}}</option>
                                            <option value="">{{__('gifts.December')}}</option>

                                        </select>

                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                    <!--col-sm-7-->

                    <div class="col-xs-4  col-lg-4 mr-auto">
                        <div class="order_summery_container">

                            <div class="summery_row">
                                <div class="row">
                                    <dvic class="col-sm-12">
                                        <h4>{{__('sign.summary')}}</h4>
                                    </dvic>
                                </div>
                            </div>

                            <div class="summery_row">

                                <div class="row">
                                    <div class="col-sm-12">

                                        <span class="summary_label">{{__('sign.email_only')}} ·</span>

                                        <a href="#" class="summary_label_change">{{__('sign.change')}}</a>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">

                                        <Span class="summary_value">@{{this.phone}}</Span>

                                    </div>
                                </div>

                            </div>


                            <div class="summery_row">

                                <div class="row">
                                    <div class="col-sm-12">

                                        <span class="summary_label">{{__('sign.plan')}}</span>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">

                                        <Span class="summary_value">@{{this.$root.serve}}
                                            {{__('sign.signature')}}</Span>

                                    </div>
                                </div>

                            </div>

                            <div class="form_divider"></div>

                            <ul class="price_breakdown">

                                <div>

                                    <li>
                                        {{__('sign.subtotal')}}

                                        <div style="{{App::isLocale('en')? 'float: right': 'float: left'}}">
                                            @{{this.$root.servingCost * this.$root.weekCost}}
                                            {{__('gifts.currency')}}</div>
                                    </li>

                                    <li>
                                        {{__('sign.shipping')}}

                                        <div style="{{App::isLocale('en')? 'float: right': 'float: left'}}">
                                            @{{this.$root.shippingCost}}
                                            {{__('gifts.currency')}}</div>
                                    </li>

                                    <li>
                                        <span style="font-weight: bold;">{{__('sign.total')}}</span>

                                        <div
                                            style="{{App::isLocale('en')? 'float: right': 'float: left'}}; font-weight: bold;">
                                            <strong>@{{this.$root.total}} {{__('gifts.currency')}}</strong></div>
                                    </li>

                                </div>

                            </ul>

                            <div class="row mt-20">
                                <div class="col-sm-12 text-center">

                                    <button class="summary_submit_btn" @click.prevent="order()">

                                        <span style="white-space: nowrap;">{{__('sign.order')}}</span>

                                    </button>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!--col-sm-5-->

                    <div class="col-xs-4 col-sm-5 col-sm-12 m-auto terms_container">

                        {{__('sign.form_term1')}}

                        <a href="#" class="terms_link">{{__('sign.form_term2')}}</a>

                        {{__('sign.form_term3')}}

                        <a href="#" class="terms_link">{{__('sign.form_term4')}}</a> .

                    </div>

                </div>
            </div>
        </div>
        <!-- Step 3 -->
        <!-- Step 4 -->
        <div v-if="this.$root.step === 4">

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

                        <div class="choose" @click.prevent="add(recipe.id, index)" v-if='hide'>
                            <div>
                                {{__('sign.choose')}}
                            </div>
                        </div>
                        <div class="choose" @click.prevent="remove(index)" v-else>
                            <div>
                                {{__('sign.choosed')}}
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

</sign_up>

@endsection