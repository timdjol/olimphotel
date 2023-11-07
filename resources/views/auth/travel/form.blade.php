@extends('auth.layouts.master')

@isset($travel)
    @section('title', 'Редактировать экскурсию ' . $travel->name)
@else
    @section('title', 'Создать экскурсию')
@endisset

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    @isset($travel)
                        <h1>Редактировать экскурсию {{ $travel->title }}</h1>
                    @else
                        <h1>Создать экскурсию</h1>
                    @endisset
                    <form method="post" enctype="multipart/form-data"
                          @isset($travel)
                              action="{{ route('travel.update', $travel) }}"
                          @else
                              action="{{ route('travel.store') }}"
                            @endisset
                    >
                        @isset($travel)
                            @method('PUT')
                        @endisset
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Заголовок</label>
                            <input type="text" name="title" value="{{ old('title', isset($travel) ? $travel->title :
                             null) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Заголовок EN</label>
                            <input type="text" name="title_en" value="{{ old('title_en', isset($travel) ?
                                $travel->title_en :
                             null) }}">
                        </div>
                            @include('auth.layouts.error', ['fieldname' => 'description'])
                            <div class="form-group">
                                <label for="">Описание</label>
                                <textarea name="description" id="editor" rows="3">{{ old('description', isset($travel) ?
                            $travel->description : null) }}</textarea>
                            </div>
                            @include('auth.layouts.error', ['fieldname' => 'description_en'])
                            <div class="form-group">
                                <label for="">Описание EN</label>
                                <textarea name="description_en" id="editor1" rows="3">{{ old('description_en', isset
                            ($travel) ?
                            $travel->description_en : null) }}</textarea>
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
                        <div class="form-group">
                            <label for="">Изображение</label>
                            @isset($travel->image)
                                <img src="{{ Storage::url($travel->image) }}" alt="">
                            @endisset
                            <input type="file" name="image">
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
