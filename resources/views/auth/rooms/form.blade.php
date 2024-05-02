@extends('auth.layouts.master')

@isset($room)
    @section('title', 'Редактировать Номер ' . $room->title)
@else
    @section('title', 'Добавить Номер')
@endisset

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    @isset($room)
                        <h1>Добавить Номер {{ $room->title }}</h1>
                    @else
                        <h1>Создать Номер</h1>
                    @endisset
                    <form method="post" enctype="multipart/form-data"
                          @isset($room)
                              action="{{ route('rooms.update', $room) }}"
                          @else
                              action="{{ route('rooms.store') }}"
                            @endisset
                    >
                        @isset($room)
                            @method('PUT')
                        @endisset
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                            <input type="hidden" value="{{ $hotel }}" name="hotel_id">
                        <div class="form-group">
                            <label for="">Заголовок</label>
                            <input type="text" name="title" value="{{ old('title', isset($room) ? $room->title :
                             null) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Заголовок EN</label>
                            <input type="text" name="title_en" value="{{ old('title_en', isset($room) ?
                                $room->title_en :
                             null) }}">
                        </div>
                        @include('auth.layouts.error', ['fieldname' => 'description'])
                        <div class="form-group">
                            <label for="">Описание</label>
                            <textarea name="description" id="editor" rows="3">{{ old('description', isset($room) ?
                            $room->description : null) }}</textarea>
                        </div>
                        @include('auth.layouts.error', ['fieldname' => 'description_en'])
                        <div class="form-group">
                            <label for="">Описание EN</label>
                            <textarea name="description_en" id="editor1" rows="3">{{ old('description_en', isset
                            ($room) ?
                            $room->description_en : null) }}</textarea>
                        </div>
                        <script src="https://cdn.tiny.cloud/1/yxonqgmruy7kchzsv4uizqanbapq2uta96cs0p4y91ov9iod/tinymce/6/tinymce.min.js"
                                referrerpolicy="origin"></script>
                        <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                            ClassicEditor
                                .create(document.querySelector('#editor1'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                        <div class="row">
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'count'])
                                <div class="form-group">
                                    <label for="">Количество номеров</label>
                                    <input type="number" name="count" value="{{ old('count', isset($room) ? $room->count :
                                null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'price'])
                                <div class="form-group">
                                    <label for="">Стоимость за взрослого</label>
                                    <input type="number" name="price" value="{{ old('price', isset($room) ? $room->price :
                                null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'pricec'])
                                <div class="form-group">
                                    <label for="">Стоимость за ребенка</label>
                                    <input type="number" name="pricec" value="{{ old('pricec', isset($room) ?
                                $room->pricec :
                                null) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Изображение</label>
                            @isset($room->image)
                                <img src="{{ Storage::url($room->image) }}" alt="">
                            @endisset
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="">Доп изображения</label>
                            @isset($images)
                                @foreach($images as $image)
                                    <img src="{{ Storage::url($image->image) }}" alt="">
                                @endforeach
                            @endisset
                            <input type="file" name="images[]" multiple="true">
                        </div>
                        <div class="form-group">
                            <label for="">Статус</label>
                            <select name="status">
                                @if(isset($room))
                                    @if($room->status == 1)
                                        <option value="{{$room->status}}">Включено</option>
                                        <option value="0">Отключено</option>
                                    @else
                                        <option value="{{$room->status}}">Отключено</option>
                                        <option value="1">Включено</option>
                                    @endif
                                @else
                                    <option value="1">Включено</option>
                                    <option value="0">Отключено</option>
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
