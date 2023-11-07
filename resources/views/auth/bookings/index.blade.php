@extends('auth.layouts.booking')

@section('title', 'Бронирование')

@section('content')

    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="icons">
                        <div class="icon icon1"> 2-местный номер в отеле</div>
                        <div class="icon icon2"> 3-местный номер в отеле</div>
                        <div class="icon icon3"> 4-местный номер в отеле</div>
                        <div class="icon icon4"> Шале двухэтажный дом</div>
                        <div class="icon icon5"> Гостевой дом</div>
                    </div>
                    <div id='calendar'></div>

                    <table>
                        <tr>
                            <th>Номер</th>
                            <th>ФИО</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Кол-во</th>
                            <th>Комментарий</th>
                            <th>Дата заезда</th>
                            <th>Дата выезда</th>
                        </tr>
                        <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>
                                    @if($booking->room_id == 1)
                                        2-местный номер в отеле
                                    @elseif($booking->room_id == 2)
                                        3-местный номер в отеле
                                    @elseif($booking->room_id == 3)
                                        4-местный номер в отеле
                                    @elseif($booking->room_id == 4)
                                        Шале двухэтажный дом
                                    @else
                                        Гостевой дом
                                    @endif
                                </td>
                                <td>{{ $booking->title }}</td>
                                <td><a href="tel:{{ $booking->phone }}">{{ $booking->phone }}</a></td>
                                <td><a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a></td>
                                <td>{{ $booking->count }}</td>
                                <td>{{ $booking->comment }}</td>
                                <td>{{ $booking->showStartDate() }}</td>
                                <td>{{ $booking->showEndDate() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <h3>Удаленные брони</h3>
                    <table>
                        <tr>
                            <th>Номер</th>
                            <th>ФИО</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Кол-во</th>
                            <th>Комментарий</th>
                            <th>Дата заезда</th>
                            <th>Дата выезда</th>
                        </tr>
                        <tbody>
                        @foreach($removed as $booking)
                            <tr>
                                <td>
                                    @if($booking->room_id == 1)
                                        2-местный номер в отеле
                                    @elseif($booking->room_id == 2)
                                        3-местный номер в отеле
                                    @elseif($booking->room_id == 3)
                                        4-местный номер в отеле
                                    @elseif($booking->room_id == 4)
                                        Шале двухэтажный дом
                                    @else
                                        Гостевой дом
                                    @endif
                                </td>
                                <td>{{ $booking->title }}</td>
                                <td><a href="tel:{{ $booking->phone }}">{{ $booking->phone }}</a></td>
                                <td><a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a></td>
                                <td>{{ $booking->count }}</td>
                                <td>{{ $booking->comment }}</td>
                                <td>{{ $booking->showStartDate() }}</td>
                                <td>{{ $booking->showEndDate() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" id="show_modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Бронирование</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">Закрыть</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form>
                                        <div class="form-group">
                                            <label class="col-xs-4" for="room_id">Выберите номер</label>
                                            <select name="room_id" id="room_id" required>
                                                <option>Выбрать</option>
                                                <option value="1">2-местный номер в отеле</option>
                                                <option value="2">3-местный номер в отеле</option>
                                                <option value="3">4-местный номер в отеле</option>
                                                <option value="4">Шале двухэтажный дом</option>
                                                <option value="6">Гостевой дом</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-4" for="title">Ваше имя</label>
                                            <input type="text" class="form-control" name="title" id="title" required />
                                            <span id="titleError" class="text-danger"></span>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-xs-4" for="phone">Номер телефона</label>
                                            <input type="number" class="form-control" name="phone" id="phone" required>
                                            <div id="output"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-4" for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" />
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-4" for="content">Комментарий</label>
                                            <input type="text" class="form-control" name="comment" id="comment" />
                                        </div>

                                        <div class="form-group">
                                            <label class="col-xs-4" for="count">Кол-во персон</label>
                                            <select name="count" id="count" required>
                                                <option>Выбрать</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-xs-4" for="start_d">Дата заезда:</label>
                                            <input type="text" name="start_d" readonly id="start_d" />
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-4" for="end_d">Дата выезда</label>
                                            <input type="text" name="end_d" readonly id="end_d" />
                                        </div>
                                        <button class="more" id="saveBtn">Оформить бронь</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>

    <style>
        table th, table td{
            font-size: 14px;
            line-height: 1.2;
        }
        table a{
            color: #009291;
            text-decoration: none;
        }
    </style>

@endsection

