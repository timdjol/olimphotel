@extends('layouts.master')

@section('title', __('main.house'))
@section('description', __('main.meta_house'))

@section('content')

    <div class="pagetitle" style="background-image: url({{ url($photos[0]) }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 data-aos="fade-up" data-aos-duration="2000">@lang('main.house')</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('index') }}">@lang('main.home')</a></li>
                        <li>></li>
                        <li>@lang('main.house')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="block-search">
        <div id="be-search-form" class="be-container">
            <a href="https://exely.com/" rel="nofollow" target="_blank">Hotel management software</a>
        </div>
    </div>

    <div class="page about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12">
                    @if(app()->getLocale() === 'en')
                        <p>Our little European street is already waiting for you at Olimp Hotel.</p>
                        <p>The new fairy-tale cottages are open and welcoming guests. A cozy atmosphere, a beautiful stay and comfort — everything for a perfect holiday on the shore of Issyk-Kul.</p>
                        <p>We look forward to seeing you!</p>
                        <p>We are pleased to present our new fairy-tale cottages at Olimp Hotel.</p>
                        <p>This is a place where you want to stop time, step away from the bustle and enjoy an atmosphere of coziness and comfort.</p>
                        <p>You are welcome: come to rest and recharge. Each time we try to surprise you with something new, so that your holiday is of the highest standard.</p>
                    @else
                        <p>Наша маленькая улочка Европы уже ждёт вас в отеле «Олимп». 🤍</p>
                        <p>Сказочные новые домики уже открыты и принимают гостей. Уютная атмосфера, красивый отдых и комфорт — всё для вашего идеального отпуска на берегу Иссык-Куля.</p>
                        <p>Ждём вас в гости! ✨</p>
                        <p>Представляем вашему вниманию наши новые сказочные домики в отеле «Олимп» ✨</p>
                        <p>Это место, где хочется остановить время, отдохнуть от суеты и насладиться атмосферой уюта и комфорта.</p>
                        <p>Добро пожаловать к нам приезжайте отдыхать и перезагружаться 🌿</p>
                        <p>Мы с каждым разом стараемся удивлять вас чем-то новым, чтобы ваш отдых проходил на самом высоком уровне.</p>
                    @endif
                    <div class="btn-wrap">
                        <a href="{{ route('booking') }}" class="more">@lang('main.book')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery">
        <div class="container">
            <div class="row">
                @foreach($photos as $photo)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                            <a href="{{ url($photo) }}"><div class="img" style="background-image: url({{ url($photo) }})"></div></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
