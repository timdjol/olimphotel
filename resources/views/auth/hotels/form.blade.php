@extends('auth.layouts.master')

@isset($hotel)
    @section('title', 'Edit ' . $hotel->title)
@else
    @section('title', 'Add hotel')
@endisset

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    @isset($hotel)
                        <h1>Edit {{ $hotel->title }}</h1>
                    @else
                        <h1>Add hotel</h1>
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
                                    <label for="">Title</label>
                                    <input type="text" name="title" value="{{ old('title', isset($hotel) ? $hotel->title :
                             null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="">Title EN</label>
                                    <input type="text" name="title_en" value="{{ old('title_en', isset($hotel) ?
                                $hotel->title_en :
                             null) }}">
                                </div>
                            </div>
                        </div>
                        @include('auth.layouts.error', ['fieldname' => 'description'])
                        <div class="form-group">
                            <label for="">Description</label>
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
                                    <label for="type">Property Type</label>
                                    <select name="type" id="type">
                                        @isset($hotel)
                                            <option @if($hotel->type)
                                                        selected>
                                                {{ $hotel->type }}</option>
                                        @else
                                            <option>Choose</option>
                                        @endif
                                        @endisset
                                        <option value="Отель">Hotel</option>
                                        {{--                                        <option value="Апартаменты">Апартаменты</option>--}}
                                        {{--                                        <option value="Хостел">Хостел</option>--}}
                                        <option value="Гостиничный дом">Гостиничный дом</option>
                                        {{--                                        <option value="Коттедж">Коттедж</option>--}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'count'])
                                <div class="form-group">
                                    <label for="">Number of room</label>
                                    <input type="number" name="count" value="{{ old('count', isset($hotel) ?
                                    $hotel->count : null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Check-in</label>
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
                                    <label for="">Check-out</label>
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
                                    <label for="early_in">Early check-in</label>
                                    <select name="early_in" id="early_in">
                                        @isset($hotel)
                                            <option @if($hotel->early_in)
                                                        selected>
                                                {{ $hotel->early_in }}</option>
                                        @else
                                            <option>Choose</option>
                                        @endif
                                        @endisset
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
                                    <label for="early_out">Late check-out</label>
                                    <select name="early_out" id="early_out">
                                        @isset($hotel)
                                            <option @if($hotel->early_out)
                                                        selected>
                                                {{ $hotel->early_out }}</option>
                                        @else
                                            <option>Choose</option>
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
                                <div class="form-group">
                                    <label for="rating">Rating</label>
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
                                    <label for="">Phone number</label>
                                    <input type="text" name="phone" value="{{ old('phone', isset($hotel) ? $hotel->phone :
                             null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'address'])
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" value="{{ old('address', isset($hotel) ?
                                $hotel->address : null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'address_en'])
                                <div class="form-group">
                                    <label for="">Address EN</label>
                                    <input type="text" name="address_en" value="{{ old('address_en', isset($hotel) ?
                                $hotel->address_en : null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'lat'])
                                <div class="form-group">
                                    <label for="">Latitude</label>
                                    <input type="text" name="lat" value="{{ old('lat', isset($hotel) ?
                                $hotel->lat : null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('auth.layouts.error', ['fieldname' => 'lng'])
                                <div class="form-group">
                                    <label for="">Longitude</label>
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
                                    <label for="">Image</label>
                                    @isset($hotel->image)
                                        <img src="{{ Storage::url($hotel->image) }}" alt="">
                                    @endisset
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Images</label>
                                    @isset($images)
                                        @foreach($images as $image)
                                            <img src="{{ Storage::url($image->image) }}" alt="">
                                        @endforeach
                                    @endisset
                                    <input type="file" name="images[]" multiple="true">
                                </div>
                            </div>
                            <div class="col-md-2">
                                @include('auth.layouts.error', ['fieldname' => 'top'])
                                <div class="form-group">
                                    <label for="">TOP (order)</label>
                                    <input type="number" name="top" value="{{ old('top', isset($hotel) ?
                                    $hotel->top : null) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status">
                                        @if(isset($hotel))
                                            @if($hotel->status == 1)
                                                <option value="{{$hotel->status}}">Active</option>
                                                <option value="0">Disable</option>
                                            @else
                                                <option value="{{$hotel->status}}">Disable</option>
                                                <option value="1">Active</option>
                                            @endif
                                        @else
                                            <option value="1">Active</option>
                                            <option value="0">Disable</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        @csrf
                        <button class="more">Send</button>
                        <a href="{{url()->previous()}}" class="btn delete cancel">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
