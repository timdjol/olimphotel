@extends('layouts.master')

@section('title', 'Главная страница')

@section('content')

    <div class="owl-carousel owl-slider">
        <div class="slider-item">
            <div class="slider-item" style="background-image: url(https://silkway.timmedia.store/storage/app/public/sliders/zcST2Jgo1uaK3e3CkF1Kbmq8gu4E1TD7HpvL4Mza.jpg)"></div>
        </div>
        <div class="slider-item">
            <div class="slider-item" style="background-image: url(https://silkway.timmedia.store/storage/app/public/sliders/PNdFu2gwhQIbrteQ5tpzwGjLJiakmMfnyBE3Zw5E.jpg)"></div>
        </div>
        <div class="slider-item">
            <div class="slider-item" style="background-image: url(https://silkway.timmedia.store/storage/app/public/sliders/Kim5wvZ8yQoPQUx5f6LjCgyQsMZAPewkr7eJULRF.jpg)"></div>
        </div>
    </div>
    <div class="search homesearch">
        <div class="container">
            <form action="{{ route('search') }}" class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Поиск по названию отеля</label>
                        <input type="search" name="search" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Дата заезда/выезда</label>
                        <input type="text" name="daterange" id="date">
                        <input type="hidden" id="start_d" name="start_d">
                        <input type="hidden" id="end_d" name="end_d">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Кол-во гостей</label>
                        <select name="count" id="">
                            <option>Выбрать</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group check">
                        <input type="checkbox" name="checkin" id="check">
                        <label for="check">Ранний заезд</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <button class="more">Поиск</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="rooms home-rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 data-aos="fade-up" data-aos-duration="2000">@lang('main.rooms')</h2>
                </div>
            </div>
            @foreach($rooms as $room)
                @include('layouts.card', compact('room'))
            @endforeach
            <div class="row">
                <div class="paginate">
                    {{ $rooms->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <style>
        .check{
            margin-top: 40px;
        }
        input[type="checkbox"]{
            width: auto;
            height: auto;
            display: inline-block;
        }

    </style>


@endsection
