@extends('layouts.master')

@section('title', $room->__('title'))

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
                        <li><a href="{{route('rooms')}}">@lang('main.rooms')</a></li>
                        <li>></li>
                        <li>{{ $room->__('title') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="rooms single">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs" data-loop="true" data-autoplay="3000">
                        <img loading="lazy" src="{{ Storage::url($room->image) }}" alt="">
                        @foreach($images as $image)
                            <img loading="lazy" src="{{ Storage::url($image->image) }}" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-duration="2000">
                    <h3>{{ $room->__('title') }}</h3>
                    <div class="price">@lang('main.price') {{$room->price }} @lang('main.som')</div>
                    <div class="btn-wrap">
                        <a href="{{ route('books.index', $room->id) }}" class="more">@lang('main.book')</a>
                        @if(session('locale')=='ru')
                            <a href="https://api.whatsapp.com/send?phone={{ $contacts->first()->whatsapp }}&text=Заявка
                        на номер {{ $room->__('title') }}" class="more whatsapp" target="_blank">@lang('main.book_whatsapp')</a>
                        @else
                            <a href="https://api.whatsapp.com/send?phone={{ $contacts->first()
                            ->whatsapp}}&text=Booking room {{ $room->__('title') }}" class="more whatsapp"
                               target="_blank">@lang('main.book_whatsapp')</a>
                        @endif
                    </div>
                    {!! $room->__('description') !!}
                    <div class="servlisting">
                        <ul>
                            @if($room->isTv())
                                <li><a href="#" class="tooltip"><img src="{{ url('/') }}/img/tv.png"><span>@lang('main.tv')</span></a></li>
                            @endif
                                @if($room->isCloset())
                                    <li><a href="#" class="tooltip"><img src="{{ url('/') }}/img/closet.png"><span>@lang('main.closet')</span></a></li>
                                @endif
                                @if($room->isSafe())
                                    <li><a href="#" class="tooltip"><img src="{{ url('/') }}/img/security-box.png"><span>@lang('main.safe')</span></a></li>
                                @endif
                                @if($room->isBar())
                                    <li><a href="#" class="tooltip"><img src="{{ url('/') }}/img/minibar.png"><span>@lang('main.bar')</span></a></li>
                                @endif
                                @if($room->isCond())
                                    <li><a href="#" class="tooltip"><img src="{{ url('/') }}/img/air-conditioner.png"><span>@lang('main.cond')</span></a></li>
                                @endif
                                @if($room->isCabinet())
                                    <li><a href="#" class="tooltip"><img src="{{ url('/') }}/img/bedside.png"><span>@lang('main.cabinet')</span></a></li>
                                @endif
                                @if($room->isWtable())
                                    <li><a href="#" class="tooltip"><img src="{{ url('/') }}/img/desk.png"><span>@lang('main.wtable')</span></a></li>
                                @endif
                        </ul>
                    </div>
                    <div class="share">
                        <div class="descr">@lang('main.share')</div>
                        <script src="https://yastatic.net/share2/share.js"></script>
                        <div class="ya-share2" data-curtain data-shape="round"
                             data-services="vkontakte,odnoklassniki,telegram,twitter,whatsapp,linkedin"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rooms related">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>@lang('main.related')</h2>
                </div>
            </div>
            @foreach($related as $room)
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
