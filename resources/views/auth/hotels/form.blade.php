@extends('auth.layouts.master')

@isset($hotel)
    @section('title', 'Редактировать отель ' . $hotel->title)
@else
    @section('title', 'Добавить отель')
@endisset

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    @isset($hotel)
                        <h1>Редактировать отель {{ $hotel->title }}</h1>
                    @else
                        <h1>Добавить отель</h1>
                    @endisset
                    <form method="post" enctype="multipart/form-data"
                          @isset($hotel)
                              action="{{ route('hotels.update', $hotel) }}"
                          @else
                              action="{{ route('hotels.store') }}"
                            @endisset
                    >
                        @isset($hotel)
                            @method('PUT')
                        @endisset
                        <div class="row">
                            <div class="col-md-6">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="">Заголовок</label>
                                    <input type="text" name="title" value="{{ old('title', isset($hotel) ? $hotel->title :
                             null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="">Заголовок EN</label>
                                    <input type="text" name="title_en" value="{{ old('title_en', isset($hotel) ?
                                $hotel->title_en :
                             null) }}">
                                </div>
                            </div>
                        </div>
                        @include('auth.layouts.error', ['fieldname' => 'description'])
                        <div class="form-group">
                            <label for="">Описание</label>
                            <textarea name="description" id="editor" rows="3">{{ old('description', isset($hotel) ?
                            $hotel->description : null) }}</textarea>
                        </div>
                        @include('auth.layouts.error', ['fieldname' => 'description_en'])
                        <div class="form-group">
                            <label for="">Описание EN</label>
                            <textarea name="description_en" id="editor1" rows="3">{{ old('description_en', isset
                            ($hotel) ?
                            $hotel->description_en : null) }}</textarea>
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
                                @include('auth.layouts.error', ['fieldname' => 'type'])
                                <div class="form-group">
                                    <label for="type">Тип недвижимости</label>
                                    <select name="type" id="type">
                                        @isset($hotel)
                                            <option @if($hotel->type)
                                                        selected>
                                                {{ $hotel->type }}</option>
                                        @else
                                            <option>Выбрать</option>
                                        @endif
                                        @endisset
                                        <option value="Отель">Отель</option>
                                        <option value="Апартаменты">Апартаменты</option>
                                        <option value="Хостел">Хостел</option>
                                        <option value="Гостиничный дом">Гостиничный дом</option>
                                        <option value="Коттедж">Коттедж</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'count'])
                                <div class="form-group">
                                    <label for="">Кол-во номеров</label>
                                    <input type="number" name="count" value="{{ old('count', isset($hotel) ?
                                    $hotel->count : null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Время заезда</label>
                                    <select name="checkin" id="">
                                        @isset($hotel)
                                            <option @if($hotel->checkin)
                                                        selected>
                                                {{ $hotel->checkin }}</option>
                                        @else
                                            <option>Выбрать</option>
                                        @endif
                                        @endisset
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                        <option value="21:00">21:00</option>
                                        <option value="22:00">22:00</option>
                                        <option value="23:00">23:00</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Время выезда</label>
                                    <select name="checkout" id="">
                                        @isset($hotel)
                                            <option @if($hotel->checkout)
                                                        selected>
                                                {{ $hotel->checkout }}</option>
                                        @else
                                            <option>Выбрать</option>
                                        @endif
                                        @endisset
                                        <option value="01:00">01:00</option>
                                        <option value="02:00">02:00</option>
                                        <option value="03:00">03:00</option>
                                        <option value="04:00">04:00</option>
                                        <option value="05:00">05:00</option>
                                        <option value="06:00">06:00</option>
                                        <option value="07:00">07:00</option>
                                        <option value="08:00">08:00</option>
                                        <option value="09:00">09:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="early_in">Ранний въезд</label>
                                    <select name="early_in" id="early_in">
                                        @isset($hotel)
                                            <option @if($hotel->early_in)
                                                        selected>
                                                {{ $hotel->early_in }}</option>
                                        @else
                                            <option>Выбрать</option>
                                        @endif
                                        @endisset
                                        <option value="02:00">02:00</option>
                                        <option value="03:00">03:00</option>
                                        <option value="04:00">04:00</option>
                                        <option value="05:00">05:00</option>
                                        <option value="06:00">06:00</option>
                                        <option value="07:00">07:00</option>
                                        <option value="08:00">08:00</option>
                                        <option value="09:00">09:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="early_out">Поздний выезд</label>
                                    <select name="early_out" id="early_out">
                                        @isset($hotel)
                                            <option @if($hotel->early_out)
                                                        selected>
                                                {{ $hotel->early_out }}</option>
                                        @else
                                            <option>Выбрать</option>
                                        @endif
                                        @endisset
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                        <option value="21:00">21:00</option>
                                        <option value="22:00">22:00</option>
                                        <option value="23:00">23:00</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'extra_place'])
                                <div class="form-group">
                                    <label for="extra_place">Кол-во доп мест</label>
                                    <input type="number" name="extra_place" value="{{ old('extra_place', isset($hotel) ?
                            $hotel->extra_place : null) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="markup">Наценка за доп место ($)</label>
                                    <input type="number" name="markup" id="markup" value="{{ old('markup', isset
                                    ($hotel) ? $hotel->markup : null) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cancelled">Стоимость отмены ($)</label>
                                    <input type="number" name="cancelled" id="cancelled" value="{{ old('cancelled',
                                    isset($hotel) ? $hotel->cancelled : null) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="include">Включено</label>
                                    <select name="include" id="include">
                                        @isset($hotel)
                                            <option @if($hotel->include)
                                                        selected>
                                                {{ $hotel->include }}</option>
                                        @else
                                            <option>Выбрать</option>
                                        @endif
                                        @endisset
                                        <option value="RO">Room only</option>
                                        <option value="BB">Breakfast</option>
                                        <option value="HB">Half board</option>
                                        <option value="FB">Full board</option>
                                        <option value="AI">All inclusive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rating">Рейтинг</label>
                                    <select name="rating" id="rating">
                                        @isset($hotel)
                                            <option @if($hotel->rating)
                                                        selected>
                                                {{ $hotel->rating }}</option>
                                        @else
                                            <option>Выбрать</option>
                                        @endif
                                        @endisset
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'phone'])
                                <div class="form-group">
                                    <label for="">Номер телефона</label>
                                    <input type="text" name="phone" value="{{ old('phone', isset($hotel) ? $hotel->phone :
                             null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'address'])
                                <div class="form-group">
                                    <label for="">Адрес</label>
                                    <input type="text" name="address" value="{{ old('address', isset($hotel) ?
                                $hotel->address : null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'address_en'])
                                <div class="form-group">
                                    <label for="">Адрес EN</label>
                                    <input type="text" name="address_en" value="{{ old('address_en', isset($hotel) ?
                                $hotel->address_en : null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'lat'])
                                <div class="form-group">
                                    <label for="">Широта</label>
                                    <input type="text" name="lat" value="{{ old('lat', isset($hotel) ?
                                $hotel->lat : null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'lng'])
                                <div class="form-group">
                                    <label for="">Долгота</label>
                                    <input type="text" name="lng" value="{{ old('lng', isset($hotel) ?
                                $hotel->lng : null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'email'])
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="{{ old('email', isset($hotel) ? $hotel->email :
                             null) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'image'])
                                <div class="form-group">
                                    <label for="">Изображение</label>
                                    @isset($hotel->image)
                                        <img src="{{ Storage::url($hotel->image) }}" alt="">
                                    @endisset
                                    <input type="file" name="image">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Статус</label>
                                    <select name="status">
                                        @if(isset($hotel))
                                            @if($hotel->status == 1)
                                                <option value="{{$hotel->status}}">Включено</option>
                                                <option value="0">Отключено</option>
                                            @else
                                                <option value="{{$hotel->status}}">Включено</option>
                                                <option value="1">Включено</option>
                                            @endif
                                        @else
                                            <option value="1">Включено</option>
                                            <option value="0">Отключено</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
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
