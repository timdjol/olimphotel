@extends('layouts.master')

@section('title', 'Об отеле')

@section('content')

    <div class="pagetitle" style="background-image: url({{ Storage::url($page->image) }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 data-aos="fade-up" data-aos-duration="2000">{{ $page->__('title') }}</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                        <li>></li>
                        <li>{{ $page->__('title') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="page about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12">
                    {!! $page->__('description') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="vantage hidden">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 data-aos="fade-up" data-aos-duration="2000">@lang('main.vantages')</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($vantages as $vantage)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="vantage-item" data-aos="zoom-in" data-aos-duration="2000">
                            <img src="{{ Storage::url($vantage->image) }}" alt="">
                            <h5>{{ $vantage->__('title') }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="page about hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12">
                    @foreach($faqs as $faq)
                        <div class="faq-item">
                            <button class="accordion">{{ $faq->__('title') }}</button>
                            <div class="accordion-content">
                                {!! $faq->__('description') !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
