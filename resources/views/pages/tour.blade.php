@extends('layouts.master')

@section('title', '3D Tour')

@section('content')

    <div class="pagetitle" style="background-image: url(https://olimphoteltravel.com/img/111.jpg)">

        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 data-aos="fade-up" data-aos-duration="2000">3D Tour</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                        <li>></li>
                        <li>3D Tour</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- start Search form script -->
    <div id='block-search'>
        <div id='be-search-form' class='be-container'>
            <a href='https://exely.com/' rel='nofollow' target='_blank'>Hotel management software</a>
        </div>
    </div>
    <!-- end Search form script -->

    <div class="page about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <iframe width="100%" height="640" frameborder="0" allow="xr-spatial-tracking; gyroscope; accelerometer" allowfullscreen scrolling="no" src="https://kuula.co/share/collection/7K0Nn?logo=-1&card=1&info=0&fs=1&vr=1&zoom=1&gyro=0&initload=0&thumbs=3&inst=ru"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="vantage" style="padding-bottom: 60px">
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
    



@endsection
