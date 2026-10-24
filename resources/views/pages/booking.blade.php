@extends('layouts.master')

@section('title', app()->getLocale() === 'ru' ? 'Бронирование номеров в отеле Olimp, Чолпон-Ата - Официальный сайт' : 'Online reservation, Cholpon-Ata - Official Site')
@section('description', __('main.meta_booking'))

@section('content')

    <body class="booking-page">
    <div class="pagetitle" style="background-image: url({{ url('/') }}/img/111.jpg)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 data-aos="fade-up" data-aos-duration="2000">@php if(app()->getLocale() == 'ru') {echo "Бронирование";} elseif(app()->getLocale() == 'en') {echo "Booking";}@endphp</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                        <li>></li>
                        <li>@php if(app()->getLocale() == 'ru') {echo "Бронирование";} elseif(app()->getLocale() == 'en') {echo "Booking";}@endphp</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- start Booking form script -->
    <div id='be-booking-form'>&nbsp;</div>
    <!-- end Booking form script -->
    </body>



@endsection
