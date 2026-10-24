@extends('auth.layouts.master')

@isset($vantage)
    @section('title', 'Редактировать преимущество ' . $vantage->title)
@else
    @section('title', 'Создать преимущество')
@endisset

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    @isset($vantage)
                        <h1>Редактировать преимущество {{ $vantage->title }}</h1>
                    @else
                        <h1>Создать преимущество</h1>
                    @endisset
                    <form method="post" enctype="multipart/form-data"
                          @isset($vantage)
                              action="{{ route('vantages.update', $vantage) }}"
                          @else
                              action="{{ route('vantages.store') }}"
                            @endisset
                    >
                        @isset($vantage)
                            @method('PUT')
                        @endisset
                        @error('title')
                        <div class="alert alert-dange">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Заголовок</label>
                            <input type="text" name="title" value="{{ old('title', isset($vantage) ? $vantage->title :
                             null) }}">
                        </div>
                        @error('title_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Заголовок EN</label>
                            <input type="text" name="title_en" value="{{ old('title_en', isset($vantage) ?
                                $vantage->title_en :
                             null) }}">
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Изображение</label>
                            @isset($vantage)
                                <img src="{{ Storage::url($vantage->image) }}" alt="">
                            @endisset
                            <input type="file" name="image">
                        </div>
                        @csrf
                        <button class="more">Отправить</button>
                        <a href="{{ url()->previous() }}" class="btn delete cancel">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
