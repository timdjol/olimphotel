<div class="row rooms-item">
    <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-duration="2000">
        <a href="{{ route('room', [isset($hotel) ? $hotel->code : $room->hotel->code, $room->code])}}">
            <div class="img" style="background-image: url({{ Storage::url($room->image) }})"></div>
        </a>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="start">@lang('main.start_d') {{ $room->hotel->checkin }}</div>
        <div class="end">@lang('main.end_d') {{ $room->hotel->checkout }}</div>
        <div class="title">{{ $room->hotel->__('title') }}</div>
        <h3>{{ $room->__('title') }}</h3>
        <div class="address">{{ $room->hotel->__('address') }}</div>
        <div class="d-xl-none d-lg-none d-block">
            <div class="price">
                @php
                    $comission = \Illuminate\Support\Facades\Auth::user()->comission;
                @endphp
                @if(isset($comission))
                    <td>{{ $room->price + ($room->price * $comission / 100) }} $</td>
                @else
                    <td>{{ $room->price }} $</td>
                @endif
            </div>
            @if($room->include != '')
                <div class="breakfast">{{ $room->include }}</div>
            @endif
        </div>
        <div class="btn-wrap">
            <a href="{{ route('room', [isset($hotel) ? $hotel->code : $room->hotel->code, $room->code])
            }}" class="more">@lang('main.more')</a>
            <a href="#" class="book-item more">@lang('main.book')
                <div class="hidden">
                    <div class="book-popup">
                        <form action="{{ route('hotel_mail') }}" method="post"
                              id="callback"
                              class="form-callback">
                            @csrf
                            <h3>Забронировать {{ $room->title }} <br> {{ $room->hotel->title }}</h3>
                            <input type="hidden" name="room_id" value="{{ $room->id}}">
                            <input type="hidden" name="hotel_id" value="{{ $room->hotel->id}}">
                            @if($start_d != '' && $end_d != '')
                                <input type="hidden" id="start_d" name="start_d"
                                       value="{{ $start_d }}">
                                <input type="hidden" id="end_d" name="end_d"
                                       value="{{ $end_d }}">
                            @else
                                <div class="form-group">
                                    <label class="col-xs-4" for="end_d">Дата</label>
                                    <input type="text" id="date">
                                    <input type="hidden" id="start_d"
                                           name="start_d">
                                    <input type="hidden" id="end_d" name="end_d">
                                </div>
                            @endif
                            @if($count == 2)
                                <div class="form-group">
                                    <label class="col-xs-4" for="title">ФИО 1 взрослого</label>
                                    <input type="text" class="form-control" name="title"
                                           id="title"
                                           required/>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4" for="title2">ФИО 2 взрозлого</label>
                                    <input type="text" class="form-control" name="title2"
                                           id="title2"
                                           required/>
                                </div>
                            @else
                                <div class="form-group">
                                    <label class="col-xs-4" for="count">Кол-во
                                        взрослых</label>
                                    <select name="count" id="count" onchange="countCheck(this);" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>

                                <div class="form-group" id="title">
                                    <label class="col-xs-4" for="title">ФИО 1 взрослого</label>
                                    <input type="text" class="form-control" name="title"
                                           id="title"
                                           required/>
                                </div>
                                <div class="form-group" id="title2">
                                    <label class="col-xs-4" for="title2">ФИО 2 взрослого</label>
                                    <input type="text" class="form-control" name="title2"
                                           required/>
                                </div>
                                @if($countc == 2)
                                    <div class="form-group">
                                        <label class="col-xs-4" for="titlec1">ФИО 1 ребенка ({{ $age1 }})</label>
                                        <input type="text" class="form-control" name="titlec1"
                                               id="titlec1" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-4" for="titlec1">ФИО 2 ребенка ({{ $age2 }})</label>
                                        <input type="text" class="form-control" name="titlec2"
                                               id="titlec2" required/>
                                    </div>
                                @elseif($countc == 3)
                                    <div class="form-group">
                                        <label class="col-xs-4" for="titlec1">ФИО 1 ребенка ({{ $age1 }})</label>
                                        <input type="text" class="form-control" name="titlec1"
                                               id="titlec1" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-4" for="titlec2">ФИО 2 ребенка ({{ $age2 }})</label>
                                        <input type="text" class="form-control" name="titlec2"
                                               id="titlec2" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-4" for="titlec3">ФИО 3 ребенка ({{ $age3 }})</label>
                                        <input type="text" class="form-control" name="titlec3"
                                               id="titlec3" required/>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="">Кол-во детей</label>
                                        <select name="countc" onchange="ageCheck(this);">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                    <div class="row" id="child1">
                                        <div class="col-md-4">
                                            <select name="age1">
                                                <option value="1 год">1 год</option>
                                                <option value="2 года">2 года</option>
                                                <option value="3 года">3 года</option>
                                                <option value="4 года">4 года</option>
                                                <option value="5 лет">5 лет</option>
                                                <option value="6 лет">6 лет</option>
                                                <option value="7 лет">7 лет</option>
                                                <option value="8 лет">8 лет</option>
                                                <option value="9 лет">9 лет</option>
                                                <option value="10 лет">10 лет</option>
                                                <option value="11 лет">11 лет</option>
                                                <option value="12 лет">12 лет</option>
                                                <option value="13 лет">13 лет</option>
                                                <option value="14 лет">14 лет</option>
                                                <option value="15 лет">15 лет</option>
                                                <option value="16 лет">16 лет</option>
                                                <option value="17 лет">17 лет</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="titlec1"
                                                       id="titlec1" placeholder="ФИО 1 ребенка" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="child2">
                                        <div class="col-md-4">
                                            <select name="age2">
                                                <option value="1 год">1 год</option>
                                                <option value="2 года">2 года</option>
                                                <option value="3 года">3 года</option>
                                                <option value="4 года">4 года</option>
                                                <option value="5 лет">5 лет</option>
                                                <option value="6 лет">6 лет</option>
                                                <option value="7 лет">7 лет</option>
                                                <option value="8 лет">8 лет</option>
                                                <option value="9 лет">9 лет</option>
                                                <option value="10 лет">10 лет</option>
                                                <option value="11 лет">11 лет</option>
                                                <option value="12 лет">12 лет</option>
                                                <option value="13 лет">13 лет</option>
                                                <option value="14 лет">14 лет</option>
                                                <option value="15 лет">15 лет</option>
                                                <option value="16 лет">16 лет</option>
                                                <option value="17 лет">17 лет</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="titlec2"
                                                       id="titlec2" placeholder="ФИО 2 ребенка" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="child3">
                                        <div class="col-md-4">
                                            <select name="age3">
                                                <option value="1 год">1 год</option>
                                                <option value="2 года">2 года</option>
                                                <option value="3 года">3 года</option>
                                                <option value="4 года">4 года</option>
                                                <option value="5 лет">5 лет</option>
                                                <option value="6 лет">6 лет</option>
                                                <option value="7 лет">7 лет</option>
                                                <option value="8 лет">8 лет</option>
                                                <option value="9 лет">9 лет</option>
                                                <option value="10 лет">10 лет</option>
                                                <option value="11 лет">11 лет</option>
                                                <option value="12 лет">12 лет</option>
                                                <option value="13 лет">13 лет</option>
                                                <option value="14 лет">14 лет</option>
                                                <option value="15 лет">15 лет</option>
                                                <option value="16 лет">16 лет</option>
                                                <option value="17 лет">17 лет</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="titlec3"
                                                       id="titlec3" placeholder="ФИО 3 ребенка" required/>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                                <style>
                                    #title2, #child2, #child3 {
                                        display: none;
                                    }
                                </style>
                                <script>
                                    function countCheck(that) {
                                        if (that.value == 2) {
                                            document.getElementById("title").style.display = "block";
                                            document.getElementById("title2").style.display = "block";
                                        } else {
                                            document.getElementById("title1").style.display = "block";
                                            document.getElementById("title2").style.display = "none";
                                        }
                                    }

                                    function ageCheck(that) {
                                        if (that.value == 2) {
                                            document.getElementById("child1").style.display = "flex";
                                            document.getElementById("child2").style.display = "flex";
                                            document.getElementById("child3").style.display = "none";
                                        } else if (that.value == 3) {
                                            document.getElementById("child1").style.display = "flex";
                                            document.getElementById("child2").style.display = "flex";
                                            document.getElementById("child3").style.display = "flex";
                                        } else {
                                            document.getElementById("child1").style.display = "flex";
                                            document.getElementById("child2").style.display = "none";
                                            document.getElementById("child3").style.display = "none";
                                        }
                                    }
                                </script>
                            @endif


                            <div class="form-group">
                                <label class="col-xs-4" for="phone">Номер
                                    телефона</label>
                                <input type="number" class="form-control"
                                       name="phone" id="phone"
                                       required>
                                <div id="output" class="output"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4" for="email">Email</label>
                                <input type="email" class="form-control"
                                       name="email" id="email" required/>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4"
                                       for="content">Комментарий</label>
                                <input type="text" class="form-control"
                                       name="comment"
                                       id="comment"/>
                            </div>


                            <input type="hidden" id="price" class="price" value="
                                                                @if(isset($comission))
                                                            {{ $room->price + ($room->price * $comission / 100) }}
                                                            @else
                                                            {{ $room->price }}
                                                        @endif">
                            <input type="hidden" id="pricec" class="pricec" value="{{
                                                                $room->pricec
                                                                }}">

                            <input type="hidden" id="count" class="count" value="{{ $count }}">
                            <input type="hidden" id="countc" class="countc" value="{{ $countc }}">

                            <div class="form-group">
                                <label for="">Стоимость</label>
                                <input type="text" id="sum" name="sum" class="sum" readonly>
                            </div>


                            <script>
                                $(document).ready( function(){
                                    $(".book-item").click(function () {
                                        let price = $('.price').val();
                                        let pricec = $('.pricec').val();
                                        let count = $('.count').val();
                                        let countc = $('.countc').val();

                                        let start_d = $('#start_d').val();
                                        let end_d = $('#end_d').val();

                                        let date1 = new Date(start_d);
                                        let date2 = new Date(end_d);
                                        let days = (date2 - date1) / (1000 * 60 * 60 * 24);


                                        let sum = (price * count * days) + (pricec * countc * days);
                                        $('.sum').val(sum + ' $');
                                    });
                                });

                            </script>

                            <button class="more" id="saveBtn">Оформить бронь
                            </button>
                        </form>
                    </div>
                </div>
            </a>


        </div>
    </div>
    <div class="col-lg-2 d-xl-block d-lg-block d-none" data-aos="fade-left" data-aos-duration="2000">
        <div class="price">
            @php
                $comission = \Illuminate\Support\Facades\Auth::user()->comission;
            @endphp
            @if(isset($comission))
                <td>{{ $room->price + ($room->price * $comission / 100) }} $</td>
            @else
                <td>{{ $room->price }} $</td>
            @endif
        </div>
        @if($room->include != null || $room->include != '' )
            <div class="breakfast">{{ $room->include }}</div>
        @endif
        @if($room->hotel->early_in != '')
            <div class="early">@lang('main.early')</div>
        @endif
        @if($room->hotel->early_out != '')
            <div class="early">@lang('main.late')</div>
        @endif
        @if($room->hotel->cancelled == 0 || $room->hotel->cancelled == '')
            @php
                $end = $_GET['end_d'] ?? null;
                $date = \Carbon\Carbon::parse($end);
                $date->locale('ru');
                $exp = $date->subDays($room->cancel_day);
                $month = $exp->getTranslatedMonthName('Do MMMM');
                $get = $exp->day . ' ' . $month;

            @endphp

            @isset($end)
                <div class="early">@lang('main.cancelled') до {{ $get }} </div>

            @endisset

        @endif
    </div>
</div>
