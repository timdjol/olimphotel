@extends('auth.layouts.master')

@section('title', 'Номера')

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row align-items-center aic">
                        <div class="col-md-7">
                            <h1>Номера</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="btn-wrap">
                                <a class="btn add" href="{{ route('rooms.create') }}"><i class="fa-solid
                                fa-plus"></i> Добавить</a>
                            </div>
                        </div>
                    </div>
                    <form class="row">
                        <div class="col px-1">
                            <label for="">Статус</label>
                            <select class="form-control w-100" id="ch_status">
                                <option value="" {{ $status === null ? 'selected' : '' }}>
                                    Выбрать
                                </option>
                                <option value="1" {{ $status === '1' ? 'selected' : '' }}>
                                    Включено
                                </option>
                                <option value="0" {{ $status === '0' ? 'selected' : '' }}>
                                    Отключено
                                </option>
                            </select>
                        </div>
                        <div class="col px-1">
                            <label for="">Показать количество</label>
                            <select class="form-control w-100" id="show_item_at_once">
                                <option value="0">Выбрать</option>
                                <option value="10" {{ $show_result == 10 ? 'selected' : '' }}>
                                    10
                                </option>
                                <option value="20" {{ $show_result == 20 ? 'selected' : '' }}>
                                    20
                                </option>
                                <option value="40" {{ $show_result == 40 ? 'selected' : '' }}>
                                    40
                                </option>
                                <option value="80" {{ $show_result == 80 ? 'selected' : '' }}>
                                    80
                                </option>
                                <option value="120" {{ $show_result == 120 ? 'selected' : '' }}>
                                    120
                                </option>
                                <option value="200" {{ $show_result == 200 ? 'selected' : '' }}>
                                    200
                                </option>
                                <option value="all"
                                        {{ $show_result == 'all' ? 'selected' : '' }}>
                                    Показать все
                                </option>
                            </select>
                        </div>
                        <div class="col px-1">
                            <label for="">Поиск</label>
                            <input type="search" class="form-control w-100" placeholder="Поиск..."
                                   name="s_query" id="s_query" value="{{ $s_query ?? '' }}">
                        </div>
                        <div class="col ps-1">
                            <label for=""></label>
                            <button class="btn btn-primary w-100 more apply" type="button"
                                    id="filter_btn">Применить
                            </button>
                        </div>
                        <style>
                            form.row {
                                margin-bottom: 30px;
                            }

                            form input, form select {
                                height: 40px;
                            }

                            .apply {
                                height: 40px;
                                margin-top: 23px;
                            }
                        </style>
                    </form>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Отель</th>
                            <th>Цена</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td><img src="{{ Storage::url($room->image) }}" alt="" width="100px"></td>
                                <td>{{ $room->title }}</td>
                                <td>{{ $room->hotel->title }}</td>
                                <td>${{ $room->price }}</td>
                                <td>
                                    <form action="{{ route('rooms.destroy', $room) }}" method="post">
                                        <ul>
                                            <li><a class="btn view" href="{{ route('rooms.show', $room)
                                            }}"><i class="fa-regular fa-eye"></i></a></li>
                                            <li><a class="btn edit" href="{{ route('rooms.edit', $room)
                                            }}"><i class="fa-regular fa-pen-to-square"></i></a></li>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn delete"><i class="fa-regular fa-trash"></i></button>
                                        </ul>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $rooms->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>
        function submit_post_filter() {
            let appUrl = {!! json_encode(url('/admin/')) !!};
            let s_query = $('#s_query').val();
            let show_item_at_once = $('#show_item_at_once').val();
            let ch_status = $('#ch_status').val();
            console.log(show_item_at_once);

            if (s_query != '') {
                s_query = s_query;
            } else {
                s_query = '0';
            }

            if (show_item_at_once != '0') {
                show_item_at_once = show_item_at_once;
            } else if (show_item_at_once == '0') {
                show_item_at_once = 0;
            } else {
                show_item_at_once = 'all';
            }

            if (ch_status != '') {
                ch_status = ch_status;
            } else {
                ch_status = '3';
            }


            window.location.href = appUrl + '/rooms/' + ch_status + '/' + show_item_at_once + '/' +
                s_query;
        }

        $(document).ready(function () {
            $('#filter_btn').click(function () {
                submit_post_filter();
            });

        });
    </script>

@endsection