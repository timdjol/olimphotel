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
                    <h5>{{ $room->hotel->__('title') }}</h5>
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
                    <div class="list">
                        <p><i class="fa-light fa-mug-saucer"></i> {{$room->hotel->include}}</p>
                        @if($room->hotel->early_in != '')
                            <p><i class="fa-light fa-calendar-days"></i> @lang('main.early')
                                {{$room->hotel->early_in}}</p>
                        @endif
                        @if($room->hotel->early_out != '')
                            <p><i class="fa-light fa-calendar-days"></i> @lang('main.early_out')
                                {{$room->hotel->early_out}}</p>
                        @endif
                        @if($room->hotel->cancelled == 0 || $room->hotel->cancelled == '')
                            <p><i class="fa-regular fa-money-bill"></i> @lang('main.cancelled')</p>
                        @else
                            <p><i class="fa-regular fa-money-bill"></i> @lang('main.cancelled-price') {{
                            $room->hotel->cancelled }}$
                        @endif

                    </div>
                    <div class="servlisting">
                        <h5>@lang('main.services'):</h5>
                       <div class="row">
                           @php
                               $services = explode(', ', $room->hotel->service->services);
                           @endphp
                           @foreach($services as $service)
                               <div class="col-md-4">
                                   <div class="item">
                                       <i class="fa-regular fa-check"></i> {{ $service }}
                                   </div>
                               </div>
                           @endforeach
                       </div>
                    </div>
                    <div class="servlisting">
                        <h5>@lang('main.payments'):</h5>
                        <div class="row">
                            @php
                                $pays = explode(', ', $room->hotel->payment->payments);
                            @endphp
                            @foreach($pays as $pay)
                                <div class="col-md-3">
                                    <div class="item">
                                        <i class="fa-light fa-credit-card"></i> {{ $pay }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
