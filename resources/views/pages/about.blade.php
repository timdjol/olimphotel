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
                <div class="col-lg-8 offset-lg-2 col-md-12">
                    {!! $page->__('description') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="vantage">
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
    
    <div class="page rules" style="padding-bottom: 0">
        <div class="container">
            <div class="col-lg-10 offset-lg-1 col-md-12">
                <img src="{{ Storage::url($page->cert) }}" alt="">
                <h2 data-aos="fade-up" data-aos-duration="2000">@lang('main.rules')</h2>
                
                {!! $page->__('rule') !!}
            </div>
        </div>
    </div>
    
    <style>
        .rules h2{
            text-align: center;
        }
        .rules img{
            margin-bottom: 10px;
        }
    </style>

    <div class="page about">
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

    <div class="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new1.jpg"><div class="img" style="background-image: url(img/new/new1.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new2.jpg"><div class="img" style="background-image: url(img/new/new2.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new3.jpg"><div class="img" style="background-image: url(img/new/new3.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new4.jpg"><div class="img" style="background-image: url(img/new/new4.jpg)"></div></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new5.jpg"><div class="img" style="background-image: url(img/new/new5.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new6.jpg"><div class="img" style="background-image: url(img/new/new6.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new7.jpg"><div class="img" style="background-image: url(img/new/new7.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new8.jpg"><div class="img" style="background-image: url(img/new/new8.jpg)"></div></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new9.jpg"><div class="img" style="background-image: url(img/new/new9.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new10.jpg"><div class="img" style="background-image: url(img/new/new10.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new11.jpg"><div class="img" style="background-image: url(img/new/new11.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new12.jpg"><div class="img" style="background-image: url(img/new/new12.jpg)"></div></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new13.jpg"><div class="img" style="background-image: url(img/new/new13.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new14.jpg"><div class="img" style="background-image: url(img/new/new14.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new15.jpg"><div class="img" style="background-image: url(img/new/new15.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new16.jpg"><div class="img" style="background-image: url(img/new/new16.jpg)"></div></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new17.jpg"><div class="img" style="background-image: url(img/new/new17.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new18.jpg"><div class="img" style="background-image: url(img/new/new18.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new19.jpg"><div class="img" style="background-image: url(img/new/new19.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new20.jpg"><div class="img" style="background-image: url(img/new/new20.jpg)"></div></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new21.jpg"><div class="img" style="background-image: url(img/new/new21.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new22.jpg"><div class="img" style="background-image: url(img/new/new22.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new23.jpg"><div class="img" style="background-image: url(img/new/new23.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new24.jpg"><div class="img" style="background-image: url(img/new/new24.jpg)"></div></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new25.jpg"><div class="img" style="background-image: url(img/new/new25.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new26.jpg"><div class="img" style="background-image: url(img/new/new26.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/new/new27.jpg"><div class="img" style="background-image: url(img/new/new27.jpg)"></div></a>
                    </div>
                </div>
 
                
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/1.jpg"><div class="img" style="background-image: url(img/1.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/3.jpg"><div class="img" style="background-image: url(img/3.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/1.jpg"><div class="img" style="background-image: url(img/1.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/4.jpg"><div class="img" style="background-image: url(img/4.jpg)"></div></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/6.jpg"><div class="img" style="background-image: url(img/6.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/5.jpg"><div class="img" style="background-image: url(img/5.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/8.jpg"><div class="img" style="background-image: url(img/8.jpg)"></div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-duration="2000">
                        <a href="img/7.jpg"><div class="img" style="background-image: url(img/7.jpg)"></div></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
