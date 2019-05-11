@extends('layouts.master')

@section('content')

    @include('layouts.header')

    <div style="margin-top: 68px !important;">

     <section style="margin: 100px auto 70px auto !important;">

     </section>

        <section class="pricing_question_section">

            <div class="container">

                <h1 class="pricing_question_section_title text-center" style="font-size: 26px !important;">{{__('pricing.common')}}</h1>

                <div class="row">
                    @foreach ($faqs as $faq)
                        
                    <div class="col-sm-6 col-md-5 col-md-push-1 ml-auto">

                        <div class="pricing_question_section_faq_txt">

                            <p class="pricing_question_section_faq_txt_question">
                                {{$faq['title_'.App::getLocale()]}}</p>
                            
                            <p class="pricing_question_section_txt">
                                    {{strip_tags($faq['content_'.App::getLocale()])}}
                            </p>

                        </div>

                    </div>
                    
                    @endforeach

                </div>

            </div>

        </section>

    </div>

    @include('layouts.footer')

@endsection