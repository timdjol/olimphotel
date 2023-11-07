@extends('layouts.master')

@section('title', $travel->__('title'))

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <div class="pagetitle" style="background-image: url({{ url('/') }}/img/111.jpg)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 data-aos="fade-up" data-aos-duration="2000">@lang('main.travel')</h1>
                    <ul class="breadcrumbs">
                        <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                        <li>></li>
                        <li><a href="{{route('categorytravel')}}">@lang('main.travel')</a></li>
                        <li>></li>
                        <li>{{ $travel->__('title') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page single-travel">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ Storage::url($travel->image) }}" alt="">
                    <div class="btn-wrap">
                        <button type="button" class="more" data-toggle="modal" data-target="#myModal">@lang('main.plan')
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h3>@lang('main.plan') {{ $travel->__('title') }}</h3>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">@lang('main.close')</button>
                                        </div>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ route('travel_mail') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $travel->__('title') }}" name="travel">
                                            <div class="form-group">
                                                <label for="choose">@lang('main.what_kind')</label>
                                                <select name="choose" id="choose" required>
                                                    <option>@lang('main.choose')</option>
                                                    <option value="@lang('main.trekking')">@lang('main.trekking')</option>
                                                    <option value="@lang('main.horse')">@lang('main.horse')</option>
                                                    <option value="@lang('main.offroad')">@lang('main.offroad')</option>
                                                    <option value="@lang('main.bike')">@lang('main.bike')</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="date">@lang('main.date')</label>
                                                <input type="text" id="date" name="dates" placeholder="Select date"
                                                       required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="count">@lang('main.count')</label>
                                                <select name="count" id="count" required>
                                                    <option>@lang('main.choose')</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">@lang('main.name')</label>
                                                <input type="text" name="name" id="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">@lang('main.phone')</label>
                                                <input type="number" name="phone" id="phone" required>
                                                <div id="output"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">@lang('main.email')</label>
                                                <input type="email" name="email" id="email">
                                            </div>
                                            <button id="send" class="more">@lang('main.send')</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrap">
                        @if(session('locale')=='ru')
                            <a href="https://api.whatsapp.com/send?phone={{ $contacts->first()->whatsapp }}&text=Заявка
                        на тур {{ $travel->__('title') }}" class="more whatsapp" target="_blank">@lang('main.plan_whatsapp')</a>
                        @else
                            <a href="https://api.whatsapp.com/send?phone={{ $contacts->first()
                            ->whatsapp}}&text=Booking tour {{ $travel->__('title') }}" class="more whatsapp"
                               target="_blank">@lang('main.plan_whatsapp')</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-7">
                    <h1>{{ $travel->__('title') }}</h1>
                    {!! $travel->__('description') !!}
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


    <div class="page travel related relatedtravel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 data-aos="fade-up" data-aos-duration="2000">@lang('main.related')</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($related as $trav)
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
