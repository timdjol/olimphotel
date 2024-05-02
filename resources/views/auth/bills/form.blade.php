@extends('auth.layouts.master')

@isset($bill)
    @section('title', 'Редактировать ' . $bill->title)
@else
    @section('title', 'Добавить')
@endisset

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    @isset($bill)
                        <h1>Редактировать {{ $bill->title }}</h1>
                    @else
                        <h1>Добавить</h1>
                    @endisset
                    <form method="post" enctype="multipart/form-data"
                          @isset($bill)
                              action="{{ route('bills.update', $bill) }}"
                          @else
                              action="{{ route('bills.store') }}"
                            @endisset
                    >
                        @isset($bill)
                            @method('PUT')
                        @endisset
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="hidden" value="{{ $hotel }}" name="hotel_id">
                        <div class="form-group">
                            <label for="">Заголовок</label>
                            <input type="text" name="title" value="{{ old('title', isset($bill) ? $bill->title :
                             null) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Дата</label>
                            <input type="date" name="date" value="{{ old('date', isset($bill) ? $bill->date :
                             null) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Файл</label>
                            <input type="file" name="file1">
                        </div>
                            <div class="form-group">
                                <label for="">Файл #2</label>
                                <input type="file" name="file2">
                            </div>
                        <div class="form-group">
                            <label for="">Статус</label>
                            <select name="status">
                                @if(isset($bill))
                                    @if($bill->status == 1)
                                        <option value="{{$bill->status}}">Активный</option>
                                        <option value="0">Не заключен</option>
                                    @else
                                        <option value="{{$bill->status}}">Не заключен</option>
                                        <option value="1">Актвиный</option>
                                    @endif
                                @else
                                    <option value="1">Активный</option>
                                    <option value="0">Не заключен</option>
                                @endif
                            </select>
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
