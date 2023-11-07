@extends('layouts.master')

@section('title', 'Номера')

@section('content')

    <div class="pagetitle" style="background-image: url({{ url('/') }}/img/111.jpg)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 data-aos="fade-up" data-aos-duration="2000">@lang('main.rooms')</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                        <li>></li>
                        <li>@lang('main.rooms')</li>
                    </ul>
                </div>
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
