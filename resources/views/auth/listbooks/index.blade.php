@extends('auth.layouts.master')

@section('title', 'Бронирование')

@section('content')

    <div class="page admin bookings">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
{{--                    <div class="btn-wrap" style="margin-bottom: 20px">--}}
{{--                        <a href="{{ route('books.create') }}" class="more add">Добавить</a>--}}
{{--                    </div>--}}
{{--                    <form action="{{ route('listbooks.index') }}" method="get">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Отель</label>--}}
{{--                                    <select name="hotels" id="hotels">--}}
{{--                                        <option>Все отели</option>--}}
{{--                                        @foreach($hotels as $hotel)--}}
{{--                                            <option value="{{ $hotel->id }}" @selected(old('hotels') == $hotel->id)--}}
{{--                                            >{{ $hotel->title }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Выберите комнату</label>--}}
{{--                                    <select name="rooms" id="rooms">--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <label for="">Кнопка</label>--}}
{{--                                <button class="more">Фильтр</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <div id='calendar'></div>--}}
                    <h1>Брони</h1>
                    <table>
                        <tr>
                            <th>Бронь</th>
                            <th>Гость</th>
                            <th>Номер</th>
                            <th>Дата</th>
                            <th>Стоимость</th>
                        </tr>
                        <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>
                                    <div class="title"># {{ $booking->id }}</div>
                                    <div class="stick">B2B</div>
                                    <div class="date">Создано {{ $booking->created_at }}</div>
                                </td>
                                <td>
                                    <div class="title">{{ $booking->title }}</div>
                                    <div class="count">{{ $booking->count }} взрос.</div>
                                    @if($booking->countc > 0)
                                        <div class="count">{{ $booking->countc }} дет.</div>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $room = \App\Models\Room::where('id', $booking->room_id)->firstOrFail();
                                    @endphp
                                    <div class="title">{{ $room->title }}</div>
                                </td>
                                <td>{{ $booking->showStartDate() }} - {{ $booking->showEndDate() }}</td>
                                <td>
                                    <div class="title">{{ $booking->sum }}</div>
                                    <div class="status"><i class="fa-regular fa-money-bill"></i> Оплачено</div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
