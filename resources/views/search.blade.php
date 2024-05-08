@extends('layouts.master')

@section('title', 'Поиск')

@section('content')

    <div class="pagetitle" style="background-image: url({{ url('/') }}/img/page.jpg)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 data-aos="fade-up" data-aos-duration="2000">@lang('main.search')</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{route('homepage')}}">@lang('main.home')</a></li>
                        <li>></li>
                        <li>@lang('main.search')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if($hotels->isNotEmpty())
        @foreach($hotels as $hotel)
            <div class="page hotel search">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ Storage::url($hotel->image) }}" alt="">
                    </div>
                    <div class="col-md-7">
                        <div class="description">
                            <h2>{{ $hotel->__('title') }}</h2>
                            <div class="address">{{ $hotel->__('address') }}</div>
                            <div class="phone"><a href="tel:{{ $hotel->__('phone') }}">{{ $hotel->__('phone') }}</a></div>
                            @php
                                $min = \App\Models\Room::where('hotel_id', $hotel->id)->whereNotNull('price')->min
                                ("price");
                            @endphp
                            <div class="price">@lang('main.from') {{ $min }} $</div>
                            <div class="rating">
                                @if($hotel->rating == 2)
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @elseif($hotel->rating == 3)
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @elseif($hotel->rating == 4)
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            </div>
                            <div class="include">
                                @lang('main.include'): {{ $hotel->include }}
                            </div>
                            <div class="early">
                                @if($hotel->early_in != '')
                                    @lang('main.early') {{ $hotel->early_in }}
                                @endif
                            </div>
                            <div class="early">
                                @if($hotel->early_out != '')
                                    @lang('main.early_out') {{ $hotel->early_out }}
                                @endif
                            </div>
                            <div class="btn-wrap">
                                <a href="{{ route('hotel', $hotel->code) }}" class="more">@lang('main.all-rooms')</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{--            <div class="change-form">--}}
                {{--                <h2>Поменять даты</h2>--}}
                {{--                {{ $start_d }} - {{ $end_d }}--}}
                {{--                <form class="row" action="{{ route('search') }}">--}}
                {{--                    <input type="hidden" name="search" value="{{ $hotel->__('title') }}">--}}
                {{--                    <div class="col-md-8">--}}
                {{--                        <input type="text" name="daterange" id="date2">--}}
                {{--                        <input type="hidden" id="start_d" name="start_d" value="{{ $start_d }}">--}}
                {{--                        <input type="hidden" id="end_d" name="end_d" value="{{ $end_d }}">--}}
                {{--                    </div>--}}
                {{--                    <script>--}}
                {{--                        $('#date2').daterangepicker({--}}
                {{--                            "autoApply": true,--}}
                {{--                            "locale": {--}}
                {{--                                "format": "YYYY-MM-DD",--}}
                {{--                                "separator": " - ",--}}
                {{--                                "applyLabel": "Apply",--}}
                {{--                                "cancelLabel": "Cancel",--}}
                {{--                                "fromLabel": "From",--}}
                {{--                                "toLabel": "To",--}}
                {{--                                "customRangeLabel": "Custom",--}}
                {{--                                "weekLabel": "W",--}}
                {{--                                "daysOfWeek": [--}}
                {{--                                    "Вс",--}}
                {{--                                    "Пн",--}}
                {{--                                    "Вт",--}}
                {{--                                    "Ср",--}}
                {{--                                    "Чт",--}}
                {{--                                    "Пт",--}}
                {{--                                    "Сб"--}}
                {{--                                ],--}}
                {{--                                "monthNames": [--}}
                {{--                                    "Январь",--}}
                {{--                                    "Февраль",--}}
                {{--                                    "Март",--}}
                {{--                                    "Апрель",--}}
                {{--                                    "Maй",--}}
                {{--                                    "Июнь",--}}
                {{--                                    "Июль",--}}
                {{--                                    "Август",--}}
                {{--                                    "Сентябрь",--}}
                {{--                                    "Октябрь",--}}
                {{--                                    "Ноябрь",--}}
                {{--                                    "Декабрь"--}}
                {{--                                ],--}}
                {{--                                "firstDay": 1--}}
                {{--                            },--}}
                {{--                            "startDate": "{{ $start_d }}",--}}
                {{--                            "endDate": "{{ $end_d }}",--}}
                {{--                            "minDate": new Date()--}}
                {{--                        }, function(start, end, label) {--}}
                {{--                            $('#start_d').val(start.format('YYYY-MM-DD'));--}}
                {{--                            $('#end_d').val(end.format('YYYY-MM-DD'));--}}

                {{--                        });--}}

                {{--                    </script>--}}
                {{--                    <div class="col-md-4">--}}
                {{--                        <button class="more">@lang('main.search')</button>--}}
                {{--                    </div>--}}
                {{--                </form>--}}
                {{--            </div>--}}
                <div class="row" style="margin-top: 60px">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table>
                                <tr>
                                    <th>@lang('main.room')</th>
                                    <th>@lang('main.include')</th>
                                    <th>@lang('main.cancel')</th>
                                    <th>@lang('main.price')</th>
                                    <th>@lang('main.payment')</th>
                                    <th></th>
                                </tr>
                                @php
                                    $rooms = \App\Models\Room::where('hotel_id', $hotel->id)->get();
                                @endphp
                                @foreach($rooms as $room)
                                    <tr>
                                        <td>{{ $room->__('title') }}</td>
                                        <td>{{ $room->hotel->include }}</td>
                                        <td>
                                            @if($room->hotel->cancelled == 0 || $room->hotel->cancelled == '')
                                                @lang('main.cancelled')
                                            @else
                                                {{ $room->hotel->cancelled }}$
                                            @endif
                                        </td>
                                        <td>{{ $room->price }} $</td>
                                        <td>{{ $room->hotel->payment->payments }}</td>
                                        <td><a href="{{ route('room', [isset($hotel) ? $hotel->code : $room->hotel->code, $room->code])
            }}" class="more">@lang('main.more')</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
{{--                <div class="location">--}}
{{--                    <h2>Локация</h2>--}}
{{--                    <div class="row">--}}
{{--                        <script src="https://maps.api.2gis.ru/2.0/loader.js"></script>--}}
{{--                        <div id="map" style="width: 100%; height: 300px;"></div>--}}
{{--                        <script>--}}
{{--                            DG.then(function () {--}}
{{--                                var map = DG.map('map', {--}}
{{--                                    center: [{{$hotel->lat}}, {{$hotel->lng}}],--}}
{{--                                    zoom: 14--}}
{{--                                });--}}
{{--                                DG.marker([{{$hotel->lat}}, {{$hotel->lng}}], {scrollWheelZoom: false})--}}
{{--                                    .addTo(map)--}}
{{--                                    .bindLabel('{{$hotel->__('title')}}', {--}}
{{--                                        static: true--}}
{{--                                    });--}}
{{--                            });--}}
{{--                        </script>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            </div>
        @endforeach


    @else
        <div class="page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>@lang('main.not_hotel')</h3>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
