@extends('layouts.master')

@section('title', 'Главная страница')

@section('content')

    <div class="slider">
        <div class="owl-carousel owl-slider">
            @foreach($sliders as $slider)
                <div class="slider-item" style="background-image: url({{ Storage::url($slider->image) }})"></div>
            @endforeach
        </div>
    </div>

    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-item">
                        <div class="img" style="background-image: url({{ Storage::url($home->image) }})"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-item">
                        <div class="text-wrap">
                            <h2 data-aos="fade-up" data-aos-duration="2000">@lang('main.about')</h2>
                            {!! $home->__('description') !!}
                            <div class="btn-wrap" data-aos="fade-up" data-aos-duration="2000">
                                <a href="{{route('about')}}" class="more">@lang('main.more')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="vantage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 data-aos="fade-up" data-aos-duration="2000">@lang('main.vantages')</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($vantages as $vantage)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="vantage-item" data-aos="zoom-in" data-aos-duration="2000">
                            <img src="{{ Storage::url($vantage->image) }}" alt="">
                            <h5>{{ $vantage->__('title') }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 data-aos="fade-up" data-aos-duration="2000">@lang('main.rooms')</h2>
                </div>
            </div>
            @foreach($rooms as $room)
                @if($loop->iteration % 2)
                    <div class="row rooms-item">
                        <div class="col-md-6" data-aos="fade-right" data-aos-duration="2000">
                            <a href="{{ route('room', $room->code) }}">
                                <div class="img" style="background-image: url({{ Storage::url($room->image) }})"></div>
                            </a>
                        </div>
                        <div class="col-md-6" data-aos="fade-left" data-aos-duration="2000">
                            <h3>{{ $room->__('title') }}</h3>
                            {!! $room->__('description') !!}
                            <div class="btn-wrap">
                                <a href="{{ route('room', $room->code) }}" class="more">@lang('main.more')</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row rooms-item second">
                        <div class="col-md-6 order-lg-1 order-md-1 order-2" data-aos="fade-right" data-aos-duration="2000">
                            <div class="text-wrap">
                                <h3>{{ $room->__('title') }}</h3>
                                {!! $room->__('description') !!}
                                <div class="btn-wrap">
                                    <a href="{{ route('room', $room->code) }}" class="more">@lang('main.more')</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 order-lg-2 order-md-2 order-1" data-aos="fade-left" data-aos-duration="2000">
                            <a href="{{ route('room', $room->code) }}">
                                <div class="img" style="background-image: url({{ Storage::url($room->image) }})"></div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
