@extends('auth.layouts.master')

@section('title', 'Вид тура ' . $rent->title)

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <h1>Вид тура {{ $rent->title }}</h1>
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>{{ $rent->id }}</td>
                        </tr>
                        <tr>
                            <td>Код</td>
                            <td>{{ $rent->code }}</td>
                        </tr>
                        <tr>
                            <td>Название</td>
                            <td>{{ $rent->title }}</td>
                        </tr>
                        <tr>
                            <td>Название EN</td>
                            <td>{{ $rent->title_en }}</td>
                        </tr>
                        <tr>
                            <td>Описание</td>
                            <td>{!! $rent->description !!}</td>
                        </tr>
                        <tr>
                            <td>Описание EN</td>
                            <td>{!! $rent->description_en  !!}</td>
                        </tr>
                        <tr>
                            <td>Изображение</td>
                            <td><img src="{{ Storage::url($rent->image) }}"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
