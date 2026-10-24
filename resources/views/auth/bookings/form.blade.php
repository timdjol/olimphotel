@extends('auth.layouts.master')

@section('title', 'Редактировать Бронирование ' . $book->title)

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    @isset($room)
                        <h1>Редактировать Бронирование {{ $book->title }}</h1>
                    @else
                        <h1>Создать Бронирование</h1>
                    @endisset
                    <form method="post" action="{{ route('bookings.update', $book) }}">
                        @isset($book)
                            @method('PUT')
                        @endisset
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Имя</label>
                            <input type="text" name="title" value="{{ old('title', isset($room) ? $room->title :
                             null) }}">
                        </div>

                        @csrf
                        <button class="more">Отправить</button>
                        <a href="{{url()->previous()}}" class="btn delete cancel">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
