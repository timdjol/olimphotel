@extends('layouts.master')

@section('title', 'Экскурсии')

@section('content')

    <div class="pagetitle" style="background-image: url({{ url('/') }}/img/111.jpg)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 data-aos="fade-up" data-aos-duration="2000">@lang('main.travel')</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                        <li>></li>
                        <li>@lang('main.travel')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="page travel">
        <div class="container">
            <div class="row">
                @foreach($travel as $trav)
                    <div class="col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="travel-item" style="background-image: url({{ Storage::url($trav->image) }})">
                            <a href="{{ route('travel', $trav->code) }}">
                                <div class="overlay"></div>
                                <h4>{{ $trav->__('title') }}</h4>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="rent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 data-aos="fade-up" data-aos-duration="2000">@lang('main.kind_tour')</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="tabs">
                    @foreach($rents as $rent)
                            @if($loop->iteration == 1)
                                <li class="tab-link current" data-tab="tab-{{ $loop->iteration }}">{{ $rent->__('title') }}</li>
                            @else
                                <li class="tab-link" data-tab="tab-{{ $loop->iteration }}">{{ $rent->__('title') }}</li>
                            @endif
                    @endforeach
                    </ul>
                        @foreach($rents as $rent)
                            @if($loop->iteration == 1)
                                <div class="tab-content current" id="tab-{{ $loop->iteration }}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="img" style="background-image: url({{ Storage::url($rent->image) }})"></div>
                                        </div>
                                        <div class="col-md-7">
                                            <h4>{{ $rent->__('title') }}</h4>
                                            {!! $rent->__('description') !!}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="tab-content" id="tab-{{ $loop->iteration }}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="img" style="background-image: url({{ Storage::url($rent->image) }})"></div>
                                        </div>
                                        <div class="col-md-7">
                                            <h4>{{ $rent->__('title') }}</h4>
                                            {!! $rent->__('description') !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
