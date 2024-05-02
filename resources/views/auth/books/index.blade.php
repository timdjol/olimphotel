@extends('auth.layouts.booking')

@section('title', 'Бронирование')

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <ul>
                            @foreach($rooms as $room)
                                <li><a href="">{{ $room->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id='calendar'></div>
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
                                                <input type="hidden" name="status" id="status" value="Забронирован">
                                                {{--                                        <input type="hidden" name="price" id="price" value="{{ $room->price }}">--}}
                                                {{--                                        <input type="hidden" name="pricec" id="pricec" value="{{ $room->pricec }}">--}}
                                                <div class="form-group">
                                                    <label for="room_id">Выберите номер</label>
                                                    <select name="room_id" id="room_id" required>
                                                        <option>Выбрать</option>
                                                        @foreach($rooms as $room)
                                                            <option value="{{ $room->id }}">{{ $room->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div id="price" class="hidden">{{ $room->price }}</div>
                                                    <div id="pricec" class="hidden">{{ $room->pricec }}</div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-4" for="title">Ваше имя</label>
                                                    <input type="text" class="form-control" name="title" id="title"
                                                           required/>
                                                    <span id="titleError" class="text-danger"></span>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-xs-4" for="phone">Номер телефона</label>
                                                    <input type="number" class="form-control" name="phone" id="phone"
                                                           required>
                                                    <div id="output" class="output"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-4" for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-4" for="content">Комментарий</label>
                                                    <input type="text" class="form-control" name="comment"
                                                           id="comment"/>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-xs-4" for="count">Кол-во взрослых</label>
                                                    <select name="count" id="count" required>
                                                        <option value="0">Выбрать</option>
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
                                                    <label class="col-xs-4" for="countс">Кол-во детей</label>
                                                    <select name="countc" id="countc" required>
                                                        <option value="0">Выбрать</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Стоимость</label>
                                                    <input type="text" id="sum" name="sum" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-xs-4" for="start_d">Дата заезда:</label>
                                                    <input type="date" name="start_d" id="start_d"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-4" for="end_d">Дата выезда</label>
                                                    <input type="date" name="end_d" id="end_d"/>
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
        </div>
    </div>

    <style>
        table th, table td {
            font-size: 14px;
            line-height: 1.2;
        }

        table a {
            color: #0163b4;
            text-decoration: none;
        }
    </style>

@endsection
