@extends('layouts.master')

@section('title', $room->__('title'))

@section('content')

    <div class="page rooms single">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs" data-loop="true"
                         data-autoplay="3000">
                        <img loading="lazy" src="{{ Storage::url($room->image) }}" alt="">
                        @foreach($images as $image)
                            <img loading="lazy" src="{{ Storage::url($image->image) }}" alt="">
                        @endforeach
                    </div>
                    <div class="cont">
                        <script src="https://maps.api.2gis.ru/2.0/loader.js"></script>
                        <div id="map" style="width: 100%; height: 300px;"></div>
                        <script>
                            DG.then(function () {
                                var map = DG.map('map', {
                                    center: [{{$room->hotel->lat}}, {{$room->hotel->lng}}],
                                    zoom: 14
                                });

                                DG.marker([{{$room->hotel->lat}}, {{$room->hotel->lng}}], {scrollWheelZoom: false})
                                    .addTo(map)
                                    .bindLabel('{{$room->hotel->__('title')}}', {
                                        static: true
                                    });
                            });
                        </script>
                        <div class="phone"><span>@lang('main.hphone')</span> <a href="tel:{{ $room->hotel->phone }}">{{
                $room->hotel->phone
                }}</a></div>
                        <div class="address"><span>@lang('main.address')</span> {{ $room->hotel->__('address') }}</div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-duration="2000">
                    <h1>{{ $room->__('title') }}</h1>
                    <div class="price">@lang('main.price') ${{$room->price }}</div>
                    <div class="btn-wrap">
                        <a href="{{ route('books.index', $room->id) }}" class="more">@lang('main.book')</a>
                        @if(session('locale')=='ru')
                            <a href="https://api.whatsapp.com/send?phone={{ $room->hotel->phone }}&text=Заявка
                        на номер {{ $room->__('title') }}" class="more whatsapp"
                               target="_blank">@lang('main.book_whatsapp')</a>
                        @else
                            <a href="https://api.whatsapp.com/send?phone={{ $room->hotel->phone}}&text=Booking room {{ $room->__('title') }}"
                               class="more whatsapp"
                               target="_blank">@lang('main.book_whatsapp')</a>
                        @endif
                    </div>
                    {!! $room->__('description') !!}
                    <div class="servlisting">

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

    @if($related->isNotEmpty())
        <div class="page rooms related">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>@lang('main.related')</h2>
                    </div>
                </div>
                @foreach($related as $room)
                    @include('layouts.card', compact('room'))
                @endforeach
            </div>
        </div>
    @endif

@endsection
