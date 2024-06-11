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
                    <div class="price">@lang('main.price') @php
                            $comission = \Illuminate\Support\Facades\Auth::user()->comission;
                        @endphp
                        @if(isset($comission))
                            <td>{{ $room->price + ($room->price * $comission / 100) }} $</td>
                        @else
                            <td>{{ $room->price }} $</td>
                        @endif</div>
                    <div class="btn-wrap">
                        <a href="#callback" class="more">@lang('main.book')</a>
                        <div class="hidden">
                            <form action="{{ route('hotel_mail') }}" method="post" id="callback" class="form-callback">
                                <h3>Забронировать {{ $room->title }} <br> {{ $room->hotel->title }}</h3>
                                <input type="hidden" name="room_id" value="{{ $room->id}}">
                                <input type="hidden" name="hotel_id" value="{{
                                                                $room->hotel->id}}">
                                <div class="form-group">
                                    <label class="col-xs-4" for="end_d">Дата</label>
                                    <input type="text" id="date">
                                    <input type="hidden" id="start_d" name="start_d">
                                    <input type="hidden" id="end_d" name="end_d">
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4" for="count">Кол-во
                                        взрослых</label>
                                    <select name="count" id="count" onchange="countCheck(this);" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>

                                <div class="form-group" id="title">
                                    <label class="col-xs-4" for="title">ФИО 1 взрослого</label>
                                    <input type="text" class="form-control" name="title"
                                           id="title"
                                           required/>
                                </div>
                                <div class="form-group" id="title2">
                                    <label class="col-xs-4" for="title2">ФИО 2 взрослого</label>
                                    <input type="text" class="form-control" name="title2"
                                           required/>
                                </div>


                                <div class="form-group">
                                    <label for="">Кол-во детей</label>
                                    <select name="countc" id="countc" onchange="ageCheck(this);">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="row" id="child1">
                                    <div class="col-md-4">
                                        <select name="age1">
                                            <option value="1 год">1 год</option>
                                            <option value="2 года">2 года</option>
                                            <option value="3 года">3 года</option>
                                            <option value="4 года">4 года</option>
                                            <option value="5 лет">5 лет</option>
                                            <option value="6 лет">6 лет</option>
                                            <option value="7 лет">7 лет</option>
                                            <option value="8 лет">8 лет</option>
                                            <option value="9 лет">9 лет</option>
                                            <option value="10 лет">10 лет</option>
                                            <option value="11 лет">11 лет</option>
                                            <option value="12 лет">12 лет</option>
                                            <option value="13 лет">13 лет</option>
                                            <option value="14 лет">14 лет</option>
                                            <option value="15 лет">15 лет</option>
                                            <option value="16 лет">16 лет</option>
                                            <option value="17 лет">17 лет</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="titlec1"
                                                   id="titlec1" placeholder="ФИО 1 ребенка" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="child2">
                                    <div class="col-md-4">
                                        <select name="age2">
                                            <option value="1 год">1 год</option>
                                            <option value="2 года">2 года</option>
                                            <option value="3 года">3 года</option>
                                            <option value="4 года">4 года</option>
                                            <option value="5 лет">5 лет</option>
                                            <option value="6 лет">6 лет</option>
                                            <option value="7 лет">7 лет</option>
                                            <option value="8 лет">8 лет</option>
                                            <option value="9 лет">9 лет</option>
                                            <option value="10 лет">10 лет</option>
                                            <option value="11 лет">11 лет</option>
                                            <option value="12 лет">12 лет</option>
                                            <option value="13 лет">13 лет</option>
                                            <option value="14 лет">14 лет</option>
                                            <option value="15 лет">15 лет</option>
                                            <option value="16 лет">16 лет</option>
                                            <option value="17 лет">17 лет</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="titlec2"
                                                   id="titlec2" placeholder="ФИО 2 ребенка" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="child3">
                                    <div class="col-md-4">
                                        <select name="age3">
                                            <option value="1 год">1 год</option>
                                            <option value="2 года">2 года</option>
                                            <option value="3 года">3 года</option>
                                            <option value="4 года">4 года</option>
                                            <option value="5 лет">5 лет</option>
                                            <option value="6 лет">6 лет</option>
                                            <option value="7 лет">7 лет</option>
                                            <option value="8 лет">8 лет</option>
                                            <option value="9 лет">9 лет</option>
                                            <option value="10 лет">10 лет</option>
                                            <option value="11 лет">11 лет</option>
                                            <option value="12 лет">12 лет</option>
                                            <option value="13 лет">13 лет</option>
                                            <option value="14 лет">14 лет</option>
                                            <option value="15 лет">15 лет</option>
                                            <option value="16 лет">16 лет</option>
                                            <option value="17 лет">17 лет</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="titlec3"
                                                   id="titlec3" placeholder="ФИО 3 ребенка" required/>
                                        </div>
                                    </div>
                                </div>

                                <style>
                                    #title2, #child2, #child3 {
                                        display: none;
                                    }
                                </style>
                                <script>
                                    function countCheck(that) {
                                        if (that.value == 2) {
                                            document.getElementById("title").style.display = "block";
                                            document.getElementById("title2").style.display = "block";
                                        } else {
                                            document.getElementById("title1").style.display = "block";
                                            document.getElementById("title2").style.display = "none";
                                        }
                                    }

                                    function ageCheck(that) {
                                        if (that.value == 2) {
                                            document.getElementById("child1").style.display = "flex";
                                            document.getElementById("child2").style.display = "flex";
                                            document.getElementById("child3").style.display = "none";
                                        } else if (that.value == 3) {
                                            document.getElementById("child1").style.display = "flex";
                                            document.getElementById("child2").style.display = "flex";
                                            document.getElementById("child3").style.display = "flex";
                                        } else {
                                            document.getElementById("child1").style.display = "flex";
                                            document.getElementById("child2").style.display = "none";
                                            document.getElementById("child3").style.display = "none";
                                        }
                                    }
                                </script>


                                <div class="form-group">
                                    <label class="col-xs-4" for="phone">Номер телефона</label>
                                    <input type="number" class="form-control" name="phone" id="phone"
                                           required>
                                    <div id="output" class="output"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4" for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"/>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4" for="content">Комментарий</label>
                                    <input type="text" class="form-control" name="comment"
                                           id="comment"/>
                                </div>

                                <input type="hidden" id="price" value="@if(isset($comission)){{ $room->price +
                                ($room->price * $comission / 100) }}
                        @else
                            {{ $room->price }}
                        @endif
                                ">
                                <input type="hidden" id="pricec" value="{{ $room->pricec }}">

                                <div class="form-group">
                                    <label for="">Стоимость</label>
                                    <input type="text" id="sum" name="sum" readonly>
                                </div>


                                <script>
                                    $("#count, #countc, #date").change(function () {
                                        let price = $('#price').val();
                                        let pricec = $('#pricec').val();
                                        let count = $('#count').val();
                                        let countc = $('#countc').val();

                                        let start_d = $('#start_d').val();
                                        let end_d = $('#end_d').val();

                                        let date1 = new Date(start_d);
                                        let date2 = new Date(end_d);
                                        days = (date2-date1) / (1000 * 60 * 60 * 24);


                                        let sum = (price * count * days) + (pricec * countc * days);
                                        $('#sum').val(sum + ' $');
                                    });

                                </script>
                                @csrf

                                <button class="more" id="saveBtn">Оформить бронь</button>
                            </form>
                        </div>
                        {{--                        @if(session('locale')=='ru')--}}
                        {{--                            <a href="https://api.whatsapp.com/send?phone={{ $room->hotel->phone }}&text=Заявка--}}
                        {{--                        на номер {{ $room->__('title') }}" class="more whatsapp"--}}
                        {{--                               target="_blank">@lang('main.book_whatsapp')</a>--}}
                        {{--                        @else--}}
                        {{--                            <a href="https://api.whatsapp.com/send?phone={{ $room->hotel->phone}}&text=Booking room {{ $room->__('title') }}"--}}
                        {{--                               class="more whatsapp"--}}
                        {{--                               target="_blank">@lang('main.book_whatsapp')</a>--}}
                        {{--                        @endif--}}
                    </div>
                    {!! $room->__('description') !!}
                    <div class="list">
                        @if($room->include != '')
                            <p><i class="fa-light fa-mug-saucer"></i> {{$room->include}}</p>
                        @endif
                        @if($room->hotel->early_in != '')
                            <p><i class="fa-light fa-calendar-days"></i> @lang('main.early')
                                {{$room->hotel->early_in}}</p>
                        @endif
                        @if($room->hotel->early_out != '')
                            <p><i class="fa-light fa-calendar-days"></i> @lang('main.late')
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
