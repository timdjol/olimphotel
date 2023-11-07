@extends('auth/layouts.master')

@section('title', 'Консоль')

@section('content')

<div class="page admin dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('auth/layouts.sidebar')
            </div>
            <div class="col-md-9">
                @if(session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                @endif
                @if(session()->has('warning'))
                    <p class="alert alert-warning">{{ session()->get('warning') }}</p>
                @endif
                <h1>Добро пожаловать {{ $user->name }}</h1>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="dashboard-item">
                            <div class="num">{{ $user->count() }}</div>
                            <h5>Количество <br> пользователей</h5>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="dashboard-item">
                            <div class="num">{{ $books->count() }}</div>
                            <h5>Количество <br> бронирований</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-item">
                            <div class="num">{{ $orders->count() }}</div>
                            <h5>Количество <br> заявок</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-item">
                            <div class="num">{{ $rooms->count() }}</div>
                            <h5>Количество <br> номеров</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-item">
                            <div class="num">{{ $travel->count() }}</div>
                            <h5>Количество <br> экскурсий</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-item">
                            <div class="num">{{ $page->count() }}</div>
                            <h5>Количество <br> страниц</h5>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
