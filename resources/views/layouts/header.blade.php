<b-navbar id="header" toggleable="md" class="header"> <!--variant="info"-->

    <div class="container">

        <b-navbar-toggle class="ml-3" target="nav_collapse"></b-navbar-toggle>

        <b-navbar-brand href="{{url('/'.App::getLocale().'/')}}" class="logo"> <img src="{{asset('files/img/logo_'.App::getLocale().'.png')}}" width="100%"></img> </b-navbar-brand>

        <b-collapse is-nav id="nav_collapse">

            <b-navbar-nav class="nav-menu">
                @auth
                <b-nav-item class="@if(isset($current) && $current == 'user_menu') active @endif" href="{{url('/'.App::getLocale().'/user/on_the_menu')}}" style="border-bottom: 2px solid transparent !important;">{{__('main.header_menu')}}</b-nav-item>
                @else
                <b-nav-item class="@if(isset($current) && $current == 'on_the_menu') active @endif" href="{{url('/'.App::getLocale().'/on_the_menu')}}" style="border-bottom: 2px solid transparent !important;">{{__('main.header_menu')}}</b-nav-item>
                @endauth
                <b-nav-item class="@if(isset($current) && $current == 'how_it_work') active @endif" href="{{url('/'.App::getLocale().'/how_it_work')}}" style="border-bottom: 2px solid transparent !important;">{{__('main.header_how_work')}}</b-nav-item>
                <b-nav-item class="@if(isset($current) && $current == 'pricing') active @endif" href="{{url('/'.App::getLocale().'/pricing')}}" style="border-bottom: 2px solid transparent !important;">{{__('main.header_pricing')}}</b-nav-item>
                <b-nav-item class="@if(isset($current) && $current == 'gifts') active @endif" href="{{url('/'.App::getLocale().'/gifts')}}" style="border-bottom: 2px solid transparent !important;">{{ __('main.header_gifts') }}</b-nav-item>{{--gifts--}}
            </b-navbar-nav>

            <!-- Right aligned nav items -->
            <b-navbar-nav class="{{ App::isLocale('en') ? 'ml-auto': 'mr-auto' }}">

                <?php

                $url = Request::url();

                ?>

                @if(App::isLocale('en'))

                    <?php

                        $path = explode('en/', $url);

                        if(isset($path[1]) && $path[1] != ''){

                            $to = $path[1];

                        }else {

                            $to = '';

                        }

                    ?>

                    <a href="{{url('ar/'.$to)}}" class="genric-btn  btn-header phone-btn blue-btn link-border radius float-md-right lg-no-boarder" style="text-decoration: none !important; font-weight: 400;{{App::isLocale('en')?'font-size: 13px' : 'font-size: 16px'}} !important; color: rgba(0,0,0,0.5) !important;">العربية</a>

                @else

                        <?php

                        $path = explode('ar/', $url);

                        if(isset($path[1]) && $path[1] != ''){

                            $to = $path[1];

                        }else {

                            $to = '';

                        }

                        ?>

                    <a href="{{url('en/'.$to)}}" class="genric-btn  btn-header phone-btn blue-btn link-border radius float-md-right lg-no-boarder" style="text-decoration: none !important; font-weight: 400;{{App::isLocale('en')?'font-size: 13px' : 'font-size: 16px'}} !important; color: rgba(0,0,0,0.5) !important;">English</a>

                @endif
<!-- Login Form -->
                @auth
                <a href="#" class="genric-btn  btn-header phone-btn blue-btn link-border radius float-md-right lg-no-boarder {{App::isLocale('en')? 'mr-2': ''}}" style="text-decoration: none !important; font-weight: 400; {{App::isLocale('en')?'font-size: 13px' : 'font-size: 16px'}} !important; color: rgba(0,0,0,0.5) !important;">{{Auth::user()->first_name}}</a>
                <a href="/logout" class="genric-btn btn-header phone-btn btn-orange radius nav-bar-sigin-btn float-md-right" style="color: #fff !important;">{{__('main.header_logout')}}</a>                
                @else
                <a href="{{url('/'.App::getLocale().'/login')}}" class="genric-btn  btn-header phone-btn blue-btn link-border radius float-md-right lg-no-boarder {{App::isLocale('en')? 'mr-2': ''}}" style="text-decoration: none !important; font-weight: 400; {{App::isLocale('en')?'font-size: 13px' : 'font-size: 16px'}} !important; color: rgba(0,0,0,0.5) !important;">{{__('main.header_login')}}</a>

                <a href="{{url('/'.App::getLocale().'/sign_up')}}" class="genric-btn btn-header phone-btn btn-orange radius nav-bar-sigin-btn float-md-right" style="color: #fff !important;">{{__('main.header_sign_up')}}</a>
                @endauth
<!-- Login Form -->
            </b-navbar-nav>

        </b-collapse>

    </div>

</b-navbar>