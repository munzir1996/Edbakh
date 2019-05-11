@extends('layouts.master')

@section('content')

    <sign_up inline-template>

        <div>

            <div class="registration_header">

                <div class="registration_header_content">

                    <a href="" class="logo_container sign_up_logo"><img src="{{asset('files/img/logo_'.App::getLocale().'.png')}}" width="100%"></a>
<!-- الخطوات -->
                    <ul class="steps">

                        <li @click="setStep(1)" :class="{active: this.step === 1}">

                            <span class="step_number">1</span>

                            <span class="step_text">{{__('sign.welcome')}}</span>

                        </li>

                        <li @click="setStep(2)" :class="{active: this.step === 2}">

                            <span class="step_number">2</span>

                            <span class="step_text">{{__('sign.plans')}}</span>

                        </li>

                        <li @click="setStep(3)" :class="{active: this.step === 3}">

                            <span class="step_number">3</span>

                            <span class="step_text">{{__('sign.checkout')}}</span>

                        </li>

                        <li @click="setStep(4)" :class="{active: this.step === 4}">

                            <span class="step_number">4</span>

                            <span class="step_text">{{__('sign.choose_meals')}}</span>

                        </li>

                    </ul>
<!-- الخطوات -->
                </div>

            </div>


            <div class="coupon_panel" v-if="this.step === 3">{{__('sign.step3_top_text')}}</div>

            <!-- Step 1 -->
            <div class="container" v-if="this.step === 1" style="margin-bottom: 92px">

                <div class="sign_up_title">

                    <h1 class="title">{{__('sign.start')}}</h1>

                    <h2 class="sub_title">{{__('sign.start_text')}}</h2>

                </div>

                <div class="row">
                    
                    <div class="col-sm-6 order-sm-2 col-md-4 {{App::isLocale('en')? 'mr-auto': 'ml-auto'}}">
                        <form>

                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="email" class="sign_up_label">{{__('sign.email')}}</label>
                                    <input id="email" type="email" class="sign_up_input">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="password" class="sign_up_label">{{__('sign.password')}}</label>
                                    <input id="password" type="password" class="sign_up_input">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="zip" class="sign_up_label">Zip</label>
                                    <input id="zip" type="text" class="sign_up_input">
                                </div>
                            </div>

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
                    
                    <div class="col-sm-6 order-md-1 col-sm-4 {{App::isLocale('en')? 'text-right': 'text-left'}} pr-0 m-auto {{App::isLocale('en')? 'ml-sm-auto': 'mr-sm-auto'}} sign_up_img_container">
                            
                            <img src="{{asset('files/img/sign_up_img.jpg')}}" class="sign_up_img">
                            
                        </div>
                        
                    </div>
                    
                </div>
                <!-- Step 1 -->
<!-- Step 2 -->
            <div class="container row m-auto" v-if="this.step === 2" style="margin-top: 20px !important;">

                <tow_person_plan
                        title="{{__('pricing.tow_person_title')}}"
                        serve="{{__('pricing.tow_person_serve')}}"
                        per_week="{{__('pricing.tow_person_per_week')}}"
                        per_serving="{{__('pricing.tow_person_per_week')}}"
                        shipping_text="{{__('pricing.tow_person_shipping')}}"
                        total1="{{__('pricing.tow_person_total1')}}"
                        total2="{{__('pricing.tow_person_total2')}}"
                        currency="{{__('pricing.currency')}}"
                        description_text="{{__('pricing.tow_person_description_text')}}"
                >

                    <div class="plan_button">

                        <button class="plan_button_content" @click.prevent="next()">{{__('pricing.select_btn')}}</button>

                    </div>


                </tow_person_plan>

                <family_plan
                        title="{{__('pricing.family_title')}}"
                        serve="{{__('pricing.family_serve')}}"
                        per_week="{{__('pricing.family_per_week')}}"
                        shipping_text="{{__('pricing.family_shipping')}}"
                        per_serving="{{__('pricing.family_per_serving')}}"
                        total1="{{__('pricing.family_total1')}}"
                        total2="{{__('pricing.family_total2')}}"
                        currency="{{__('pricing.currency')}}"
                        description_text="{{__('pricing.family_description_text')}}"
                >

                    <div class="plan_button">

                        <button class="plan_button_content" @click.prevent="next()">{{__('pricing.select_btn')}}</button>

                    </div>

                </family_plan>


            </div>
            <!-- Step 2 -->
<!-- Step 3 -->
            <div class="checkout_container" v-if="this.step === 3">
                <div class="container">
                    <div class="row">

                        <div class="col-xs-8 col-lg-8 ml-auto">
                            <form>
                                <div class="mb-30">

                                    <div class="mb-10 row">
                                        <div class="col-md-12">
                                            <h4>{{__('sign.information')}}</h4>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="form-group col-lg-5">
                                            <label  class="checkout_label">{{__('sign.first')}}</label>
                                            <input  type="text" class="checkout_input">
                                        </div>

                                        <div class="form-group col-lg-5">
                                            <label  class="checkout_label">{{__('sign.last')}}</label>
                                            <input  type="text" class="checkout_input">
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="form-group col-lg-10">
                                            <label  class="checkout_label">{{__('sign.address')}}</label>
                                            <input  type="text" class="checkout_input">
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="form-group col-lg-6">
                                            <label  class="checkout_label">{{__('sign.city')}}</label>
                                            <input  type="text" class="checkout_input">
                                        </div>

                                        {{--<div class="form-group col-lg-2">
                                            <label  class="checkout_label">{{__('sign.')}}</label>
                                            <input  type="text" class="checkout_input">
                                        </div>--}}

                                        <div class="form-group col-lg-4">
                                            <label  class="checkout_label">Zip*</label>
                                            <input  type="text" class="checkout_input">
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="form-group col-lg-6">
                                            <label  class="checkout_label">{{__('sign.phone_number')}}</label>
                                            <input  type="text" class="checkout_input">
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
                                            <label  class="checkout_label">{{__('sign.card_number')}}</label>
                                            <input  type="text" class="checkout_input">
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label  class="checkout_label">{{__('sign.security')}}</label>
                                            <input  type="text" class="checkout_input">
                                        </div>

                                    </div>

                                    <div class="row mb-10">
                                        <div class="form-group col-lg-12">
                                            <label  class="checkout_label">{{__('sign.expiration')}}</label>

                                            <!--<input  type="text" class="checkout_input">-->

                                            <select name="" class="gifts_email_input" style="width: 75px !important; display: inline-block !important;">

                                                <option value="">2018</option>
                                                <option value="">2019</option>

                                            </select>

                                            <select name="" class="gifts_email_input" style="width: 95px !important; display: inline-block !important;">

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
                        </div><!--col-sm-7-->

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

                                            <Span class="summary_value">Alnejome@gmail.com</Span>

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

                                            <Span class="summary_value">{{__('sign.signature')}}</Span>

                                        </div>
                                    </div>

                                </div>

                                <div class="form_divider"></div>

                                <ul class="price_breakdown">

                                    <div>

                                        <li>
                                            {{__('sign.subtotal')}}

                                            <div style="{{App::isLocale('en')? 'float: right': 'float: left'}}">59.94 {{__('gifts.currency')}}</div>
                                        </li>

                                        <li>
                                            {{__('sign.shipping')}}

                                            <div style="{{App::isLocale('en')? 'float: right': 'float: left'}}">{{__('sign.free')}}</div>
                                        </li>

                                        <li>
                                            <span style="font-weight: bold;">{{__('sign.total')}}</span>

                                            <div style="{{App::isLocale('en')? 'float: right': 'float: left'}}; font-weight: bold;"><strong>59.94 {{__('gifts.currency')}}</strong></div>
                                        </li>

                                    </div>

                                </ul>

                                <div class="row mt-20">
                                    <div class="col-sm-12 text-center">

                                        <button class="summary_submit_btn" @click.prevent="next()">

                                            <span style="white-space: nowrap;">{{__('sign.order')}}</span>

                                        </button>

                                    </div>
                                </div>

                            </div>
                        </div><!--col-sm-5-->

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
            <div v-if="this.step === 4">

                <div class="container">

                    <div class="mb-10 row mt-25">
                        <div class="col-12">

                            <h4 style="font-size: 23px;">{{__('sign.week')}}</h4>

                        </div>
                    </div>

                </div>

                <div class="container mt-4 mb-4 d-flex flex-row flex-wrap  p-0">

                    <div class="card mr-2 mb-2 p-0">

                        <div class=" meal-image">
                            <img class="card-img" src="{{asset('files/img/meal1.jpg')}}">
                        </div>

                        <div class="card-body">

                            <div class="meal-title">
                                {{__('sign.title')}}
                            </div>

                            <div class="meal-sub-title">
                                {{__('sign.sub_title')}}
                            </div>

                        </div>

                        <div class="meal-footer justify-content-between" style="background: #fff !important;">

                            <div class="meal-time">

                                <span><i class="far fa-clock"></i></span>

                                <p class="mr-1">30 {{__('sign.min')}}</p>  | &nbsp;

                                <span><i class="fas fa-fire"></i></span>

                                <p>890</p>

                            </div>

                            <div class="choose">
                                {{__('sign.choose')}}
                            </div>

                            <div class="details">
                                {{__('sign.details')}}
                            </div>

                        </div>

                    </div>

                    <div class="card mr-2 mb-2 p-0">

                        <div class=" meal-image">
                            <img class="card-img" src="{{asset('files/img/meal2.jpg')}}">
                        </div>

                        <div class="card-body">

                            <div class="meal-title">
                                {{__('sign.title')}}
                            </div>

                            <div class="meal-sub-title">
                                {{__('sign.sub_title')}}
                            </div>

                        </div>

                        <div class="meal-footer justify-content-between" style="background: #fff !important;">

                            <div class="meal-time">

                                <span><i class="far fa-clock"></i></span>

                                <p class="mr-1">30 {{__('sign.min')}}</p>  | &nbsp;

                                <span><i class="fas fa-fire"></i></span>

                                <p>890</p>

                            </div>

                            <div class="choose">
                                {{__('sign.choose')}}
                            </div>

                            <div class="details">
                                {{__('sign.details')}}
                            </div>

                        </div>

                    </div>

                    <div class="card mr-2 mb-2 p-0">

                        <div class=" meal-image">
                            <img class="card-img" src="{{asset('files/img/meal3.png')}}">
                        </div>

                        <div class="card-body">

                            <div class="meal-title">
                                {{__('sign.title')}}
                            </div>

                            <div class="meal-sub-title">
                                {{__('sign.sub_title')}}
                            </div>

                        </div>

                        <div class="meal-footer justify-content-between" style="background: #fff !important;">

                            <div class="meal-time">

                                <span><i class="far fa-clock"></i></span>

                                <p class="mr-1">30 {{__('sign.min')}}</p>  | &nbsp;

                                <span><i class="fas fa-fire"></i></span>

                                <p>890</p>

                            </div>

                            <div class="choose">
                                {{__('sign.choose')}}
                            </div>

                            <div class="details">
                                {{__('sign.details')}}
                            </div>

                        </div>

                    </div>

                </div>

            </div>
<!-- Step 4 -->

            {{--<div class="copy_right">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-6">© Edbakh, LLC 2018 | A better way to cook</div>

                        <div class="col-sm-6" style="text-align: right">

                            <a href="#">Privacy Policy</a>

                            &nbsp;&nbsp;&nbsp;

                            <a href="#">Terms of Use</a>

                        </div>

                    </div>
                </div>
            </div>--}}


            <!--</div>-->

        </div>

    </sign_up>

@endsection