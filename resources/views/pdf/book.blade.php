<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
    <title>StayBook</title>
</head>
<body>

<style>
    body { font-family: DejaVu Sans }
    .date{
        margin: 20px 0;
        opacity: .3;
        font-size: 12px;
    }
    .name{
        font-size: 14px;
        opacity: .5;
    }
    .col-md-6{
        display: inline-block;
        width: 45%;
        margin-bottom: 20px;
    }
    .col-md-4{
        display: inline-block;
        width: 30%;
        margin-bottom: 20px;
    }
</style>

<div class="page admin">
    <div class="container">
        <div class="row">
            <div class="col-md-12 modal-content">
                <div class="logo"><img src="{{ public_path("img/logo.png") }}" alt="Logo" style="width:
                    100px; height: 72px;"></div>
                <div class="date">Дата создания: {{ $date }}</div>
                <h1>Бронь #{{ $book->id }}</h1>

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
                            <div class="img" style="margin-top: 40px"><img src="{{ storage_path('app/public/'
                            .$room->image) }}"
                                alt="Logo" style="width: 200px; height: 150px;"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-item">
                            <div class="name">Отель</div>
                            <div class="title">{{ $room->hotel->title }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-item">
                            <div class="name">Номер</div>
                            <div class="title">{{ $room->title }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dashboard-item">
                            <div class="name">Стоимость</div>
                            <div class="title">{{ $book->sum }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dashboard-item">
                            <div class="name">Статус</div>
                            <div class="status" style="color: green"><i class="fa-regular fa-money-bill"></i>
                                Оплачено
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>