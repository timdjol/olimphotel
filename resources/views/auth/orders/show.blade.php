@extends('auth.layouts.master')

@section('title', 'Категория ' . $travel->title)

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <h1>Экскурсия {{ $travel->title }}</h1>
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>{{ $travel->id }}</td>
                        </tr>
                        <tr>
                            <td>Код</td>
                            <td>{{ $travel->code }}</td>
                        </tr>
                        <tr>
                            <td>Название</td>
                            <td>{{ $travel->title }}</td>
                        </tr>
                        <tr>
                            <td>Название EN</td>
                            <td>{{ $travel->title_en }}</td>
                        </tr>
                        <tr>
                            <td>Описание</td>
                            <td>{!! $travel->description !!}</td>
                        </tr>
                        <tr>
                            <td>Описание EN</td>
                            <td>{!! $travel->description_en  !!}</td>
                        </tr>
                        <tr>
                            <td>Изображение</td>
                            <td><img src="{{ Storage::url($travel->image) }}"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
