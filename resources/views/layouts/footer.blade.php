<footer class="footer-area" style="padding-top: 50px !important;">
    <div class="container">

        <div class="row" style="margin-bottom: 20px !important;">

            <ul class="col-md-2 col-sm-12 footer-nav">

                <li><a class="footer-text" href="{{url('/'.App::getLocale().'/on_the_menu')}}"><i class="fas fa-angle-right"></i> &nbsp; {{__('main.header_menu')}}</a></li>
                <li><a class="footer-text" href="{{url('/'.App::getLocale().'/how_it_work')}}"><i class="fas fa-angle-right"></i> &nbsp; {{__('main.header_how_work')}}</a></li>
                <li><a class="footer-text" href="{{url('/'.App::getLocale().'/pricing')}}"><i class="fas fa-angle-right"></i> &nbsp; {{__('main.header_pricing')}}</a></li>
                <li><a class="footer-text" href="{{url('/'.App::getLocale().'/gifts')}}"><i class="fas fa-angle-right"></i> &nbsp; {{__('main.header_gifts')}}</a></li>
                <li><a class="footer-text" href="{{url('/'.App::getLocale().'/cookbook')}}"><i class="fas fa-angle-right"></i> &nbsp; {{__('main.footer_cookbook')}}</a></li>

            </ul>

            <ul class="col-md-2 col-sm-12 footer-nav">

                <span class="footer-title">{{__('main.footer_follow')}}:</span>
                <li><a class="footer-text" href="#"><i class="fas fa-angle-right"></i> &nbsp; <i class="fab fa-facebook-square"></i>&nbsp; {{__('main.footer_facebook')}}</a></li>
                <li><a class="footer-text" href="#"><i class="fas fa-angle-right"></i> &nbsp; <i class="fab fa-twitter"></i>&nbsp; {{__('main.footer_twitter')}}</a></li>
                <li><a class="footer-text" href="#"><i class="fas fa-angle-right"></i> &nbsp; <i class="fab fa-instagram"></i>&nbsp; {{__('main.footer_insta')}}</a></li>


            </ul>

            <ul class="col-md-3 col-sm-12 footer-nav">

                <span class="footer-title">{{__('main.footer_contact_us')}}:</span>
                <li><span class="footer-text"><i class="fas fa-angle-right footer-text2"></i> &nbsp; <strong class="footer-text2">{{__('main.footer_phone')}}:</strong> <a href="#" class="footer-link">{{$setting->phone}}</a></span></li>
                <li><span class="footer-text"><i class="fas fa-angle-right footer-text2"></i> &nbsp; <strong class="footer-text2">{{__('main.footer_email')}}:</strong> <a href="#" class="footer-link">{{$setting->email}}</a></span></li>

            </ul>

            <ul class="col-md-5 col-sm-12 footer-nav">

                <span class="footer-title" style="margin-bottom: 10px !important;">{{__('main.footer_discover')}}</span>

                <li class="footer-text2" style="margin-bottom: 20px;">{{__('main.footer_offers')}}</li>
<!-- subscribe -->
                <form>

                    <input type="email" class="footer-email-input" placeholder="{{__('main.footer_email_address')}}">

                    <input class="footer-submit-btn" type="submit" value="{{__('main.footer_go')}}">

                    <br>

                </form>
<!-- subscribe -->
            </ul>

        </div>

        <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">

            <p class="footer-text footer-text2 m-0" style="font-size: 10px !important;">Copyright ©2018 All rights reserved by Edbakh</p>

        </div>

    </div>
</footer>