@extends('auth.layouts.master')

@section('title', 'Номер ' . $room->title)

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <h1>Вид тура {{ $room->title }}</h1>
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>{{ $room->id }}</td>
                        </tr>
                        <tr>
                            <td>Код</td>
                            <td>{{ $room->code }}</td>
                        </tr>
                        <tr>
                            <td>Название</td>
                            <td>{{ $room->title }}</td>
                        </tr>
                        <tr>
                            <td>Название EN</td>
                            <td>{{ $room->title_en }}</td>
                        </tr>
                        <tr>
                            <td>Описание</td>
                            <td>{!! $room->description !!}</td>
                        </tr>
                        <tr>
                            <td>Описание EN</td>
                            <td>{!! $room->description_en  !!}</td>
                        </tr>
                        <tr>
                            <td>Изображение</td>
                            <td><img src="{{ Storage::url($room->image) }}"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
