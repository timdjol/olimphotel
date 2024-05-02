@extends('auth.layouts.master')

@isset($service)
    @section('title', 'Редактировать страницу' . $service->title)
@else
    @section('title', 'Создать страницу')
@endisset

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <form method="post"
                          @isset($service)
                              action="{{ route('services.update', $service) }}"
                          @else
                              action="{{ route('services.store') }}"
                            @endisset>
                        @isset($service)
                            @method('PUT')
                        @endisset
                        <input type="hidden" name="title" value="Услуги">
                            <input type="hidden" name="hotel_id" value="{{ $hotel }}">
                        <div class="row">
                            <div class="name">Услуги</div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="checkbox" name="services[]" id="rent" value="Аренда авто"
                                    @isset($service){{ in_array('Аренда авто', $services) ? 'checked' : '' }}@endisset>
                                    <label for="rent">Аренда авто</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="zal" type="checkbox" name="services[]" value="Спорт зал"
                                    @isset($service) {{ in_array('Спорт зал', $services) ? 'checked' : '' }}@endisset>
                                    <label for="zal">Спорт зал</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="conf" type="checkbox" name="services[]" value="Аренда конференц-зала"
                                    @isset($service){{ in_array('Аренда конференц-зала', $services) ? 'checked' : ''
                                    }}@endisset>
                                    <label for="conf">Аренда конференц-зала</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="pool" type="checkbox" name="services[]" value="Бассейн"
                                    @isset($service){{ in_array('Бассейн', $services) ? 'checked' : '' }}@endisset>
                                    <label for="pool">Бассейн</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="air" type="checkbox" name="services[]" value="Встреча в аэропорту"
                                    @isset($service){{ in_array('Встреча в аэропорту', $services) ? 'checked' : '' }}
                                            @endisset>
                                    <label for="air">Встреча в аэропорту</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="gid" type="checkbox" name="services[]" value="Гид"
                                    @isset($service){{ in_array('Гид', $services) ? 'checked' : '' }}@endisset>
                                    <label for="gid">Гид</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="mas" type="checkbox" name="services[]" value="Массаж"
                                    @isset($service){{ in_array('Массаж', $services) ? 'checked' : '' }}@endisset>
                                    <label for="mas">Массаж</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="ip" type="checkbox" name="services[]" value="IP Телевидение"
                                    @isset($service){{ in_array('IP Телевидение', $services) ? 'checked' : '' }}@endisset>
                                    <label for="ip">IP Телевидение</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="play" type="checkbox" name="services[]" value="Платяной шкаф"
                                    @isset($service){{ in_array('Платяной шкаф', $services) ? 'checked' : '' }}@endisset>
                                    <label for="plat">Платяной шкаф</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="safe" type="checkbox" name="services[]" value="Персональный сейф"
                                    @isset($service){{ in_array('Персональный сейф', $services) ? 'checked' : '' }}@endisset>
                                    <label for="safe">Персональный сейф</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="minibar" type="checkbox" name="services[]" value="Минибар"
                                    @isset($service){{ in_array('Минибар', $services) ? 'checked' : '' }}@endisset>
                                    <label for="minibar">Минибар</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="cond" type="checkbox" name="services[]" value="Кондиционер зима-лето"
                                    @isset($service){{ in_array('Кондиционер зима-лето', $services) ? 'checked' : '' }}@endisset>
                                    <label for="cond">Кондиционер зима-лето</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="tumb" type="checkbox" name="services[]" value="Прикроватные тумбы"
                                    @isset($service){{ in_array('Прикроватные тумбы', $services) ? 'checked' : '' }}@endisset>
                                    <label for="tumb">Прикроватные тумбы</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="desk" type="checkbox" name="services[]" value="Рабочий стол"
                                    @isset($service){{ in_array('Рабочий стол', $services) ? 'checked' : '' }}@endisset>
                                    <label for="desk">Рабочий стол</label>
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

    <style>
        .admin label {
            display: inline-block;
        }
    </style>

@endsection
