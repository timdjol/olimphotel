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

    @if($hotel)
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
                        <div class="price">@lang('main.from') {{ $min }} $</div>
                        <div class="btn-wrap">
                            <a href="{{ route('hotel', $hotel->code) }}" class="more">Показать все номера</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="change-form">
                <h2>Поменять даты</h2>
                <form class="row" action="{{ route('search') }}">
                    <input type="hidden" name="search" value="{{ $hotel->__('title') }}">
                    <div class="col-md-8">
                        <input type="text" name="daterange" id="date">
                        <input type="hidden" id="start_d" name="start_d">
                        <input type="hidden" id="end_d" name="end_d">
                    </div>
                    @dd()
                    <script>
                        $('#date').daterangepicker({
                            "startDate": "05/02/2024",
                            "endDate": "05/02/2024",
                            "minDate": new Date()
                        }, function(start, end, label) {
                            $('#start_d').val(start.format('YYYY-MM-DD'));
                            $('#end_d').val(end.format('YYYY-MM-DD'));

                        });

                    </script>
                    <div class="col-md-4">
                        <button class="more">@lang('main.search')</button>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table>
                            <tr>
                                <th>Номер</th>
                                <th>Завтрак</th>
                                <th>Отмена</th>
                                <th>Стоимость</th>
                                <th>Оплата</th>
                                <th></th>
                            </tr>
                            @foreach($rooms as $room)
                                <tr>
                                    <td>{{ $room->__('title') }}</td>
                                    <td>
                                        @if ($room->hotel->breakfast != '')
                                            @lang('main.breakfast')
                                        @endif
                                    </td>
                                    <td>0 $</td>
                                    <td>{{ $room->price }} $</td>
                                    <td>@lang('main.payment')</td>
                                    <td><a href="{{ route('room', [isset($hotel) ? $hotel->code : $room->hotel->code, $room->code])
            }}" class="more">@lang('main.more')</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="location">
                <h2>Локация</h2>
                <div class="row">
                    <script src="https://maps.api.2gis.ru/2.0/loader.js"></script>
                    <div id="map" style="width: 100%; height: 300px;"></div>
                    <script>
                        DG.then(function () {
                            var map = DG.map('map', {
                                center: [{{$hotel->lat}}, {{$hotel->lng}}],
                                zoom: 14
                            });
                            DG.marker([{{$hotel->lat}}, {{$hotel->lng}}], {scrollWheelZoom: false})
                                .addTo(map)
                                .bindLabel('{{$hotel->__('title')}}', {
                                    static: true
                                });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
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
