@extends('auth.layouts.master')

@section('title', 'Бронь ' . $book->title)

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-12 modal-content">
                    <h1>Бронь #{{ $book->id }}</h1>
                    <div class="print">
                        <a href="javascript:window.print();"><i class="fa-regular fa-print"></i>
                            Печать</a>
                    </div>
                    <div class="download">
                        <a href="{{ route('pdf', $book->id) }}"><i class="fa-regular fa-download"></i> Скачать</a>
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
                                <div class="name">ФИО</div>
                                {{ $book->title }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard-item">
                                <div class="name">Кол-во</div>
                                <div>{{ $book->count }} взрос.</div>
                                @if($book->countc > 0)
                                    <div>{{ $book->countc }} дет.</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dashboard-item">
                                <div class="name">Дата заезда/выезда</div>
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
                                <div class="name">Отель</div>
                                <div class="wrap">
                                    <h5>{{ $room->hotel->title }}</h5>
                                    <div class="name" style="margin-top: 20px">Номер</div>
                                    <div class="title">{{ $room->title }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-item">
                                <div class="name">Стоимость</div>
                                {{ $book->sum }}
                                <div class="name" style="margin-top: 20px">Статус</div>
                                <div class="status"><i class="fa-regular fa-money-bill"></i>
                                    Оплачено
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
