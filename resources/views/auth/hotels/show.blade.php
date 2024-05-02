@extends('auth.layouts.master')

@section('title', 'Отель ' . $hotel->title)

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
                            <h1>Основное</h1>
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
                                <div class="name">Наименование</div>
                                <h5>{{ $hotel->title }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard-item">
                                <div class="name">Часовой пояс</div>
                                <h5>+06 (UTC +6)
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard-item">
                                <div class="name">Адрес</div>
                                <div class="address">{{ $hotel->address }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-item">
                                <div class="name">Количество комнат</div>
                                <h5>{{ $hotel->count }}</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashboard-item">
                                <div class="name">Дата заезда</div>
                                <h5>{{ $hotel->checkin }}</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashboard-item">
                                <div class="name">Дата выезда</div>
                                <h5>{{ $hotel->checkout }}</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashboard-item">
                                <div class="name">ID</div>
                                <h5>{{ $hotel->id }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard-item">
                                <div class="name">Описание</div>
                                <div class="descr">{!! $hotel->description !!}</div>
                            </div>
                            <div class="dashboard-item">
                                <div class="images">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ Storage::url($hotel->image) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-item">
                                <h3>Информация для гостей</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="name">Номер телефона</div>
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
                                <h3>Сотрудники</h3>
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
                                    Администратор
                                @elseif($users->is_admin == 2)
                                    Менеджер
                                @elseif($users->is_admin == 3)
                                    Бухгалтер
                                @elseif($users->is_admin == 4)
                                    Менеджер Отеля
                                @else
                                    Пользователь
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
