@extends('layouts.master')

@section('title', __('main.restaurant'))
@section('description', __('main.meta_restaurant'))

@section('content')

    <div class="pagetitle" style="background-image: url({{ url($photos[0]) }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 data-aos="fade-up" data-aos-duration="2000">@lang('main.restaurant')</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('index') }}">@lang('main.home')</a></li>
                        <li>></li>
                        <li>@lang('main.restaurant')</li>
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
                        <p>Restaurant Olimp — a taste you want to come back for.</p>
                        <p>If you are looking for a place with good food, a pleasant atmosphere and comfort, we are waiting for you at Restaurant Olimp.</p>
                        <p>We are in the very centre of Cholpon-Ata, so you can stop by any time for breakfast, lunch or a quiet evening with your favourite dishes.</p>
                        <p>Restaurant Olimp, Cholpon-Ata. Come with the whole family, meet friends and simply enjoy the food.</p>
                        <p>We look forward to seeing you at Olimp!</p>
                    @else
                        <p>Ресторан «Олимп» — вкус, который хочется повторить.</p>
                        <p>Если вы ищете место с вкусной кухней, приятной атмосферой и уютом — ждём вас в ресторане «Олимп» ♥</p>
                        <p>Мы находимся в самом центре Чолпон-Аты, чтобы вы могли в любой момент заглянуть к нам на завтрак, обед или уютный вечер за любимыми блюдами.</p>
                        <p>Ресторан «Олимп», Чолпон-Ата. Приходите всей семьёй, встречайтесь с друзьями и просто наслаждайтесь вкусной кухней.</p>
                        <p>Ждём вас в «Олимпе»! ♥</p>
                    @endif
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
