@extends('auth.layouts.master')

@section('title', 'Бронь ' . $book->title)

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-12 modal-content">
                    <h1>Booking #{{ $book->id }}</h1>
                    <div class="print">
                        <a href="javascript:window.print();"><i class="fa-regular fa-print"></i>
                            Print</a>
                    </div>
                    <div class="download">
                        <a href="{{ route('pdf', $book->id) }}"><i class="fa-regular fa-download"></i> Download</a>
                    </div>
                    <div class="row wrap">
                        <div class="col-md-6">
                            <div class="dashboard-item">
                                <div class="name">ID</div>
                                <span># {{ $book->id }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard-item">
                                <div class="name">Guests</div>
                                {{ $book->title }}<br>
                                {{ $book->title2 }}<br>
                                {{ $book->titlec1 }} - ({{$book->age1}})<br>
                                {{ $book->titlec2 }} - ({{$book->age2}})<br>
                                {{ $book->titlec3 }} - ({{$book->age3}})
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard-item">
                                <div class="name">Count</div>
                                <div>{{ $book->count }} adult</div>
                                @if($book->countc > 0)
                                    <div>{{ $book->countc }} child</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard-item">
                                <div class="name">Date of stay</div>
                                {{ $book->showStartDate() }} - {{ $book->showEndDate() }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-item">
                                @php
                                    $room = \App\Models\Room::where('id', $book->room_id)->firstOrFail();
                                @endphp
                                <div class="img"><img src="{{ Storage::url($room->image) }}"
                                                      alt="" width="200px"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-item">
                                <div class="name">Hotel</div>
                                <div class="wrap">
                                    <h5>{{ $room->hotel->title }}</h5>
                                    <div class="name" style="margin-top: 20px">Room</div>
                                    <h5>{{ $room->title }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-item">
                                <div class="name">Price</div>
                                {{ $book->sum }}
                                <div class="name" style="margin-top: 20px">Status</div>
                                <div class="status"><i class="fa-regular fa-money-bill"></i>
                                    Paid
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
