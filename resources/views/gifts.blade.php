@extends('layouts.master')

@section('content')

    @include('layouts.header')

    <div style="margin-top: 68px !important;  background-color: #f7f7f7 !important;">

        <section class="container" style="padding-right: 0 !important; padding-left: 0 !important;">

            <div class="gifts_card_banner">

                <div class="gifts_meal">

                    <h1 class="gifts_meal_title">{{__('gifts.title')}}</h1>

                </div>

            </div>

        </section>

        <gifts_content inline-template>

            <section class="gift_container">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-4">

                            <div class="gift_card_image">

                                <div class="gift_card_amount">
                                    {{__('gifts.currency')}} @{{this.giftAmount}}
                                </div>

                                <div class="gift_card_text">
                                    {{__('gifts.card_text')}}
                                </div>

                                <div class="gift_card_brand_logo">
                                    {{__('gifts.website_name')}}
                                </div>

                            </div>

                            <!--<ul class="gift_info_list">

                            <li class="gift_info_bold">
                                $60 covers a one-week delivery of our 2-Person Meal Plan (2 recipes per week)
                            </li>

                            <li class="gift_info_bold">
                                Recipients can use the E-Gift Card towards either the 2-Person or Family Plan.
                            </li>

                            </ul>-->

                        </div>

                        <div class="col-xs-12 col-sm-12  col-lg-6 mr-0 mb-5">

                            <form>
<!-- مبلغ الهدية -->
                                <div style="margin-bottom: 20px;">

                                    <legend class="gifts_title">{{__('gifts.amount')}}</legend>

                                    <fieldset class="gifts_input_set">

                                        <input id="60_value" value=""  type="radio" name="gift_amount" class="gifts_radio" checked>

                                        <label for="60_value" @click="changeGiftAmount(60)" class="gifts_label">
                                            <span>60 {{__('gifts.currency')}}</span>
                                        </label>

                                        <input id="120_value" value=""  type="radio" name="gift_amount" class="gifts_radio">

                                        <label for="120_value" @click="changeGiftAmount(120)" class="gifts_label">
                                            <span>120 {{__('gifts.currency')}}</span>
                                        </label>

                                        <input id="240_value" value=""  type="radio" name="gift_amount" class="gifts_radio">

                                        <label for="240_value" @click="changeGiftAmount(240)" class="gifts_label">
                                            <span>240 {{__('gifts.currency')}}</span>
                                        </label>

                                        <input id="480_value" value=""  type="radio" name="gift_amount" class="gifts_radio">

                                        <label for="480_value" @click="changeGiftAmount(480)" class="gifts_label">
                                            <span>480 {{__('gifts.currency')}}</span>
                                        </label>


                                    </fieldset>

                                </div>
<!-- مبلغ الهدية -->

                                <div style="margin-bottom: 20px;">

                                    <legend class="gifts_title">{{__('gifts.type')}}</legend>

                                    <fieldset class="gifts_input_set">

                                        <input id="print_at_home" value=""  type="radio" name="gift_type" class="gifts_radio" checked>

                                        <label for="print_at_home" @click="changeGiftType(1)"  class="gifts_label gifts_type_label">
                                            <span>{{__('gifts.home_type')}}</span>
                                        </label>

                                        <input id="email_to" value=""  type="radio" name="gift_type" class="gifts_radio">

                                        <label for="email_to" @click="changeGiftType(2)"  class="gifts_label gifts_type_label">
                                            <span>{{__('gifts.email_type')}}</span>
                                        </label>

                                        <input id="send_whatsapp" value=""  type="radio" name="gift_type" class="gifts_radio">

                                        <label for="send_whatsapp" @click="changeGiftType(3)"  class="gifts_label gifts_type_label">
                                            <span>{{__('gifts.message_type')}}</span>
                                        </label>


                                    </fieldset>

                                </div>
<!-- إرسالها الي المنزل -->
                                <div v-if="this.giftType == 1" style="margin-bottom: 20px;">

                                    <legend class="gifts_title">{{__('gifts.quantity')}}</legend>

                                    <div class="gifts_quantity_wrapper">

                                        <button @click="minusGiftAmount" style="display: inline-block !important; {{App::isLocale('en')? 'border-top-right-radius: 0; border-bottom-right-radius: 0;': 'border-top-left-radius: 0; border-bottom-left-radius: 0;'}}" type="button" class="gifts_quantity_btn"> - </button>

                                        <input style="display: inline-block !important; margin-right: -4px !important;" type="text" class="form-control gifts_quantity_number" v-model="quantity" min="1" max="50">

                                        <button @click="addGiftAmount" style="display: inline-block !important; {{App::isLocale('en')? 'border-top-left-radius: 0; border-bottom-left-radius: 0;': 'border-top-right-radius: 0; border-bottom-right-radius: 0;'}}" type="button" class="gifts_quantity_btn"> + </button>

                                    </div>

                                </div>
<!-- إرسالها الي المنزل -->
<!-- ارسالها في بريد الي المستلم -->
                                <div v-if="this.giftType == 2" style="margin-bottom: 20px;">

                                    <div class="form-group">

                                        <div class="control-group">

                                            <label class="form-control-label gifts_email_label">{{__('gifts.from')}}</label>


                                            <div class="control">

                                                <input type="text" placeholder="{{__('gifts.your_name')}}" class="gifts_email_input">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="control-group">

                                            <label class="form-control-label gifts_email_label">{{__('gifts.to')}}</label>

                                            <div class="control">

                                                <input type="text" placeholder="{{__('gifts.name')}}" class="gifts_email_input">

                                            </div>

                                            <div class="control mt-2">

                                                <input type="text" placeholder="{{__('gifts.email')}}" class="gifts_email_input">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="control-group">

                                            <label class="form-control-label gifts_email_label">{{__('gifts.on')}}</label>

                                            <div class="controls">

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

                                                <select name="" class="gifts_email_input" style="width: 55px !important; display: inline-block !important;">

                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                    <option value="">7</option>
                                                    <option value="">8</option>
                                                    <option value="">9</option>
                                                    <option value="">10</option>
                                                    <option value="">11</option>
                                                    <option value="">12</option>
                                                    <option value="">13</option>
                                                    <option value="">14</option>
                                                    <option value="">15</option>
                                                    <option value="">16</option>
                                                    <option value="">17</option>
                                                    <option value="">18</option>
                                                    <option value="">19</option>
                                                    <option value="">20</option>
                                                    <option value="">21</option>
                                                    <option value="">22</option>
                                                    <option value="">23</option>
                                                    <option value="">24</option>
                                                    <option value="">25</option>
                                                    <option value="">26</option>
                                                    <option value="">27</option>
                                                    <option value="">28</option>
                                                    <option value="">29</option>
                                                    <option value="">30</option>

                                                </select>

                                                <select name="" class="gifts_email_input" style="width: 75px !important; display: inline-block !important;">

                                                    <option value="">2018</option>
                                                    <option value="">2019</option>

                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="control-group">

                                            <label class="form-control-label gifts_email_label">{{__('gifts.message')}}</label>


                                            <div class="control">

                                                <textarea class="gifts_email_textarea" rows="3" maxlength="250" placeholder="{{__('gifts.message_text')}}"></textarea>

                                            </div>

                                        </div>

                                    </div>


                                </div>
<!-- ارسالها في بريد الي المستلم -->
<!-- ارسالها في رسالة الي المستلم -->
                                <div v-if="this.giftType == 3" style="margin-bottom: 20px;">

                                    <div class="form-group">

                                        <div class="control-group">

                                            <label class="form-control-label gifts_email_label">{{__('gifts.to')}}</label>

                                            <div class="control">

                                                <input type="text" placeholder="{{__('gifts.phone_number')}}" class="gifts_email_input">

                                            </div>

                                        </div>

                                        <div class="control-group">

                                            <label class="form-control-label gifts_email_label">{{__('gifts.message_type2')}}</label>

                                            <fieldset class="gifts_input_set">

                                                <input id="sms_message" value=""  type="radio" name="message_type" class="gifts_radio" checked>

                                                <label for="sms_message"  class="gifts_label">
                                                    <span>{{__('gifts.sms')}}</span>
                                                </label>

                                                <input id="whatsapp_message" value=""  type="radio" name="message_type" class="gifts_radio">

                                                <label for="whatsapp_message"  class="gifts_label">
                                                    <span>{{__('gifts.whatsapp')}}</span>
                                                </label>


                                            </fieldset>

                                        </div>

                                    </div>

                                </div>
<!-- ارسالها في رسالة الي المستلم -->
                                <button type="button" class="gifts_email_button">{{__('gifts.send')}}</button>

                            </form>

                        </div>

                    </div>

                </div>

            </section>

        </gifts_content>

    </div>

    @include('layouts.footer')

@endsection