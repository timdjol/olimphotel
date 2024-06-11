<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <title>@yield('title') - StayBook</title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Template Basic Images Start -->
    <meta property="og:image" content="path/to/image.jpg">
    <link rel="icon" href="{{route('index')}}/img/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="{{route('index')}}/img/favicon/apple-touch-icon-180x180.png">
    <!-- Template Basic Images End -->

    <!-- Custom Browser Color Start -->
    <meta name="theme-color" content="#000">
    <!-- Custom Browsers Color End -->

    <link rel="stylesheet" href="{{route('index')}}/css/admin.css">
    <link href="{{route('index')}}/css/print.css" rel="stylesheet" media="print" type="text/css">
    <link rel="stylesheet" href="{{route('index')}}/css/main.min.css">

</head>

<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="logo">
                    <a href="{{route('hotels.index')}}"><img src="https://silkway.timmedia.store/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-md-4">
                <form>
                    <select id="dynamic_select">
                        <option>@lang('main.choose')</option>
                        @foreach($hotels as $hotel)
                            <option @if($hotel->id == $hotel_id) selected @endif value="{{ route('hotels.show', $hotel)
                            }}"
                                    data-hotel="{{
                            $hotel->id
                            }}">{{
                            $hotel->title}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="col-md-3">
                @if($hotel->status == 1)
                <div class="status active"><i class="fa-solid fa-circle"></i> Active</div>
                    @else
                    <div class="status"><i class="fa-solid fa-circle"></i> Disable</div>
                @endif
            </div>
            <div class="col-md-3">
                <div class="homelink">
                    <a href="{{route('homepage')}}" target="_blank"><i class="fas fa-house"></i> Visit site</a></a>
                </div>
            </div>
        </div>
    </div>
    <div class="head">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <nav>
                        <ul>
                            <li @routeactive('hotels.index')><a href="{{route('hotels.index')}}"><i class="fas
                            fa-hotel"></i> Hotels</a></li>
                            <li @routeactive('bookings.index')><a href="{{route('bookings.index')}}"><i
                                        class="fa-regular
                            fa-tag"></i> Rates and availability</a></li>
                            <li @routeactive('listbooks.index')><a href="{{route('listbooks.index')}}"><i
                                        class="fa-regular fa-tag"></i> Bookings</a></li>
                            <li @routeactive('rooms.index')><a href="{{route('rooms.index')}}"><i class="fas
                            fa-booth-curtain"></i> Rooms</a></li>
                            <li><a href="{{route('bills.index')}}"><i class="fa-thin fa-money-bills"></i> Bills</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-4 person">
                    <a href="{{route('profile.edit')}}"><i class="fa-regular fa-address-card"></i> Profile</a>
                    <a href="{{route('logout')}}" class="delete"><i class="fa-regular fa-door-open"></i> Logout</a>
                </div>
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
        </div>
    </div>
</div>
@yield('content')

<footer>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li @routeactive('pages.index')><a href="{{ route('pages.index')}}"><i class="fas
            fa-page"></i> Pages</a></li>
                        <li @routeactive('contacts.index')><a href="{{ route('contacts.index')}}"><i class="fas
            fa-address-book"></i> Contacts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>All rights reserved &copy; {{ date('Y') }} StayBook</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('#dynamic_select').on('change', function() {
            let url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });
    });
</script>

</body>
</html>

