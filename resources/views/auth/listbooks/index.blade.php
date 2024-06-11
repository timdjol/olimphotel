@extends('auth.layouts.master')

@section('title', 'Bookings')

@section('content')

    <div class="page admin bookings">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Bookings</h1>
                    <table>
                        <tr>
                            <th>Booking</th>
                            <th>Guests</th>
                            <th>Room</th>
                            <th>Dates of stay</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>
                                    <div class="title"># {{ $book->id }}</div>
                                    <div class="stick">B2B</div>
                                    <div class="date">Created {{ $book->created_at }}</div>
                                </td>
                                <td>
                                    <div class="title">{{ $book->title }}</div>
                                    <div class="count">{{ $book->count }} adult</div>
                                    @if($book->countc > 0)
                                        <div class="count">{{ $book->countc }} child</div>
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
                                    <div class="status"><i class="fa-regular fa-money-bill"></i> Paid</div>
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
