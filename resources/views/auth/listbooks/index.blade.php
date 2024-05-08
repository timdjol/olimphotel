@extends('auth.layouts.master')

@section('title', 'Бронирование')

@section('content')

    <div class="page admin bookings">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Брони</h1>
                    <table>
                        <tr>
                            <th>Бронь</th>
                            <th>Гость</th>
                            <th>Номер</th>
                            <th>Дата</th>
                            <th>Стоимость</th>
                            <th>Действия</th>
                        </tr>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>
                                    <div class="title"># {{ $book->id }}</div>
                                    <div class="stick">B2B</div>
                                    <div class="date">Создано {{ $book->created_at }}</div>
                                </td>
                                <td>
                                    <div class="title">{{ $book->title }}</div>
                                    <div class="count">{{ $book->count }} взрос.</div>
                                    @if($book->countc > 0)
                                        <div class="count">{{ $book->countc }} дет.</div>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $room = \App\Models\Room::where('id', $book->room_id)->firstOrFail();
                                    @endphp
                                    <div class="title">{{ $room->title }}</div>
                                </td>
                                <td>{{ $book->showStartDate() }} - {{ $book->showEndDate() }}</td>
                                <td>
                                    <div class="title">{{ $book->sum }}</div>
                                    <div class="status"><i class="fa-regular fa-money-bill"></i> Оплачено</div>
                                </td>
                                <td><a href="{{ route('listbooks.show', $book)}}" class="more"><i class="fa-regular fa-eye"></i></a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection
