@extends('auth.layouts.master')

@section('title', 'Hotel ' . $hotel->title)

@section('content')

    <div class="page admin dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-6 main">
                    @if(session()->has('success'))
                        <p class="alert alert-success">{{ session()->get('success') }}</p>
                    @endif
                    @if(session()->has('warning'))
                        <p class="alert alert-warning">{{ session()->get('warning') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Main</h1>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-wrap">
                                <form action="{{ route('hotels.edit', $hotel) }}">
                                    <button><i class="fa-regular fa-pen-to-square"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dashboard-item">
                                <div class="name">Title</div>
                                <h5>{{ $hotel->title }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{--                            <div class="dashboard-item">--}}
                            {{--                                <div class="name">Часовой пояс</div>--}}
                            {{--                                <h5>+06 (UTC +6)--}}
                            {{--                                </h5>--}}
                            {{--                            </div>--}}
                            <div class="dashboard-item">
                                <div class="name">Address</div>
                                <div class="address">{{ $hotel->address }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-item">
                                <div class="name">ID</div>
                                <h5>{{ $hotel->id }}</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashboard-item">
                                <div class="name">Number of rooms</div>
                                <h5>{{ $hotel->count }}</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashboard-item">
                                <div class="name">Check-in</div>
                                <h5>{{ $hotel->checkin }}</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashboard-item">
                                <div class="name">Check-out</div>
                                <h5>{{ $hotel->checkout }}</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashboard-item">
                                <div class="name">Early check-in</div>
                                <h5>{{ $hotel->early_in }}</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashboard-item">
                                <div class="name">Late check-out</div>
                                <h5>{{ $hotel->early_out }}</h5>
                            </div>
                        </div>
{{--                        <div class="col-md-3">--}}
{{--                            <div class="dashboard-item">--}}
{{--                                <div class="name">Количество доп мест</div>--}}
{{--                                <h5>{{ $hotel->extra_place }}</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-md-3">
                            <div class="dashboard-item">
                                <div class="name">Rating</div>
                                @if($hotel->rating == 2)
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @elseif($hotel->rating == 3)
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @elseif($hotel->rating == 4)
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            </div>
                        </div>
{{--                        <div class="col-md-3">--}}
{{--                            <div class="dashboard-item">--}}
{{--                                <div class="name">Стоимость отмены</div>--}}
{{--                                <h5>{{ $hotel->cancelled }}$</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <div class="dashboard-item">--}}
{{--                                <div class="name">Включено</div>--}}
{{--                                <h5>{{ $hotel->include }}</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="dashboard-item">--}}
{{--                                <div class="name">Наценка за доп место</div>--}}
{{--                                <h5>{{ $hotel->markup }}$</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard-item">
                                <div class="name">Services</div>
                                <h6>{{ $hotel->service->services }}</h6>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="dashboard-item">
                                <div class="name">Payment</div>
                                <h6>{{ $hotel->payment->payments }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard-item">
                                <div class="name">Description</div>
                                <div class="descr">{!! $hotel->description !!}</div>
                            </div>
                            <div class="dashboard-item">
                                <div class="images">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img loading="lazy" src="{{ Storage::url($hotel->image) }}" alt="">
                                        </div>
                                        @isset($images)
                                            @foreach($images as $image)
                                                <div class="col-md-3">
                                                    <img loading="lazy" src="{{ Storage::url($image->image) }}" alt="">
                                                </div>
                                            @endforeach
                                        @endisset
                                        <style>
                                            .admin img{
                                                max-width: 100%;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-item">
                                <h3>Information</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="name">Phone number</div>
                                        <h5>{{ $hotel->phone }}</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="name">Email</div>
                                        <h5>{{ $hotel->email }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="profile">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>Employees</h3>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('users.create') }}"><i class="fa-regular fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="wrap">
                            <a href="{{ route('profile.edit') }}"><i class="fa-regular fa-pen-to-square"></i></a>
                            <div class="name">{{ $users->name }}</div>
                            <div class="position">
                                @if($users->is_admin == 1)
                                    Administrator
                                @elseif($users->is_admin == 2)
                                    Manager
                                @elseif($users->is_admin == 3)
                                    Buhgalter
                                @elseif($users->is_admin == 4)
                                    Oteller
                                @else
                                    User
                                @endif
                            </div>
                            <div class="phone"><i class="fa-regular fa-phone"></i> {{ $users->phone }}</div>
                            <div class="email"><i class="fa-regular fa-envelope"></i> {{ $users->email }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
