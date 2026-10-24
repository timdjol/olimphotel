<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>@yield('title') - OlimpHotelTravel</title>
    <meta name="description" content="@yield('description', __('main.meta_description'))">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Template Basic Images Start -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title') - OlimpHotelTravel">
    <meta property="og:description" content="@yield('description', __('main.meta_description'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ url('/storage/app/public/sliders/C04rgeSW4qbsNbbAGbn2j15zPqojnQBbJdchuGUN.jpg') }}">
    <link rel="icon" href="{{route('index')}}/img/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{route('index')}}/img/favicon.png">
    <!-- Template Basic Images End -->

    <!-- Custom Browsers Color Start -->
    <meta name="theme-color" content="#000">
    <!-- Custom Browsers Color End -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{route('index')}}/css/main.min.css?ver=1.2">
    <link rel="stylesheet" href="{{route('index')}}/css/style.css">

    <!-- start head script -->
    <script type='text/javascript'>
        !function(e,n){
            var t="bookingengine",o="integration",i=e[t]=e[t]||{},a=i[o]=i[o]||{},r="__cq",c="__loader",d="getElementsByTagName";
            if(n=n||[],a[r]=a[r]?a[r].concat(n):n,!a[c]){a[c]=!0;var l=e.document,g=l[d]("head")[0]||l[d]("body")[0];
                !function n(i){if(0!==i.length){var a=l.createElement("script");a.type="text/javascript",a.async=!0,a.src="https://"+i[0]+"/integration/loader.js",
                    a.onerror=a.onload=function(n,i){return function(){e[t]&&e[t][o]&&e[t][o].loaded||(g.removeChild(n),i())}}(a,(function(){n(i.slice(1,i.length))})),g.appendChild(a)}}(
                    ["kg-ibe.hopenapi.com","ibe.hopenapi.com","ibe.behopenapi.com"])}
        }(window,[
            ['setContext', 'BE-INT-olimphoteltravel_2024-04-03', @php if(app()->getLocale() == 'ru') {echo "'ru'";} elseif(app()->getLocale() == 'en') {echo "'en'";}@endphp],
            ['embed', 'booking-form', {container: 'be-booking-form'}],
            ['embed', 'search-form', {container: 'be-search-form'}],
        ]);
    </script>
    <link rel="stylesheet" href="{{route('index')}}/css/be-style.css">
    <!-- end head script -->

</head>

<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-6">
                <div class="logo">
                    <a href="{{route('index')}}"><img src="{{ url('/') }}/img/logo.svg" alt=""></a>
                </div>
            </div>
            <div class="col-md-10 col-6">
                <ul class="lang d-xl-none d-lg-none d-inline-block">
                    <li class="
                            @if(session('locale')=='ru')
                                current
                            @endif
                            "><a href="{{ route('locale', 'ru') }}">RU</a></li>
                    <li class="
                            @if(session('locale')=='en')
                                current
                            @endif
                            "><a href="{{ route('locale', 'en') }}">EN</a></li>
                </ul>
                <nav>
                    <a href="#" class="toggle-mnu d-xl-none d-lg-none"><span></span></a>
                    <ul>
                        <li @routeactive('index')><a href="{{route('index')}}">@lang('main.home')</a></li>
                        <li @routeactive('rooms')><a href="{{route('rooms')}}">@lang('main.rooms')</a></li>
                        <li @routeactive('about')><a href="{{route('about')}}">@lang('main.about')</a></li>
                        <li @routeactive('house')><a href="{{route('house')}}">@lang('main.house')</a></li>
                        <li @routeactive('categorytravel')><a href="{{route('categorytravel')}}">@lang('main.travel')</a></li>
                        <li @routeactive('contactspage')><a href="{{route('contactspage')}}">@lang('main.contacts')
                        </a></li>
                        <li><a href="{{route('tour')}}" class="more">3D Tour</a></li>

                    </ul>
                    <ul class="lang">
                        <li class="
                            @if(session('locale')=='ru')
                                current
                            @endif
                            "><a href="{{ route('locale', 'ru') }}">RU</a></li>
                        <li class="
                            @if(session('locale')=='en')
                                current
                            @endif
                            "><a href="{{ route('locale', 'en') }}">EN</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
                <p class="alert alert-success">{{ session()->get('success') }}</p>
            @endif
            @if(session()->has('warning'))
                <p class="alert alert-warning">{{ session()->get('warning') }}</p>
            @endif
            @if(session()->has('form_ok'))
                <p class="alert alert-success">{{ session('form_ok') }}</p>
            @endif
            @if(session()->has('form_error'))
                <p class="alert alert-danger">{{ session('form_error') }}</p>
            @endif
            @if($errors->any())
                <p class="alert alert-danger">{{ $errors->first() }}</p>
            @endif
        </div>
    </div>
</div>
@yield('content')

<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6">
                    <div class="footer-item">
                        <div class="logo"><img src="{{ url('/') }}/img/logo.svg" alt=""></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4>@lang('main.rooms')</h4>
                        <ul>
                            @foreach($rooms as $room)
                                <li><a href="{{ route('room', $room->code) }}">{{ $room->__('title')
                                }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4>@lang('main.navigation')</h4>
                        <ul>
                            <li @routeactive('rooms')><a href="{{route('rooms')}}">@lang('main.rooms')</a></li>
                            <li @routeactive('about')><a href="{{route('about')}}">@lang('main.about')</a></li>
                            <li @routeactive('house')><a href="{{route('house')}}">@lang('main.house')</a></li>
                            <li @routeactive('categorytravel')><a href="{{route('categorytravel')}}">@lang('main.travel')</a></li>
                            <li @routeactive('contactspage')><a href="{{route('contactspage')}}">@lang('main.contacts')
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-item">
                        <h4>@lang('main.contacts')</h4>
                        <ul>
                            <li>{{ $contacts->first()->__('address') }}</li>
                            <li><a href="tel:{{ $contacts->first()->phone }}">{{ $contacts->first()->phone }}</a></li>
                            <li><a href="tel:{{ $contacts->first()->phone2 }}">{{ $contacts->first()->phone2 }}</a></li>
                        </ul>
                        <ul class="soc">
                            <li><a href="{{ $contacts->first()->instagram }}" target="_blank"><img src="{{route('index')}}/img/instagram.svg" alt=""></a>
                            </li>
                            <li><a href="https://wa.me/{{ $contacts->first()->whatsapp }}" target="_blank"><img src="{{route('index')}}/img/whatsapp.svg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>@lang('main.copy') &copy; {{ date('Y') }} olimphoteltravel.com</p>
                    <style>
    .developer {
        font-size: 14px;
        color: #f5f5f5;
        text-align: center;
    }

    .developer a {
        color: #fff;
        text-decoration: none;
        transition: .3s;
    }

    .developer a:hover {
        color: #c0392b;
    }
</style>
<div class="developer">
    Developed by <a href="https://timdjol.com" target="_blank">Tim Djol</a>
</div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="btn-wrap">
    <a target="_blank" href="https://wa.me/{{ $contacts->first()->whatsapp }}">
        <i class="Phone is-animating"></i>
    </a>
</div>

<script src="{{route('index')}}/js/scripts.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>


</body>

</html>

