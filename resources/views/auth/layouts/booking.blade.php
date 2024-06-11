<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - SilkWayTravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{route('index')}}/img/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{route('index')}}/img/favicon.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css"
          rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/gh/eliyantosarage/font-awesome-pro@main/fontawesome-pro-6.5.1-web/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.min.css">
    <link rel="stylesheet" href="{{route('index')}}/css/admin.css">
    <link rel="stylesheet" href="{{route('index')}}/css/main.min.css">
    <link rel="stylesheet" href="{{route('index')}}/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="logo">
                    <a href="{{route('hotels.index')}}"><img src="https://silkway.timmedia.store/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-md-4">
                <form>
                    <select id="dynamic_select">
                        <option>@lang('main.choose')</option>
                        @foreach($hotels as $hotel)
                            <option @if($hotel->id == $hotel_id) selected @endif value="{{ route('hotels.show', $hotel)
                            }}"
                                    data-hotel="{{
                            $hotel->id
                            }}">{{
                            $hotel->title}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="col-md-3">
                <div class="status active"><i class="fa-solid fa-circle"></i> Активно</div>
            </div>
            <div class="col-md-3">
                <div class="homelink">
                    <a href="{{route('index')}}"><i class="fas fa-house"></i> Перейти на сайт</a></a>
                </div>
            </div>
        </div>
    </div>
    <div class="head">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <nav>
                        <ul>
                            <li @routeactive('hotels.index')><a href="{{route('hotels.index')}}"><i class="fas
                            fa-hotel"></i> Hotels</a></li>
                            <li @routeactive('bookings.index')><a href="{{route('bookings.index')}}"><i
                                        class="fa-regular
                            fa-tag"></i> Rates and availability</a></li>
                            <li @routeactive('listbooks.index')><a href="{{route('listbooks.index')}}"><i
                                        class="fa-regular fa-tag"></i> Bookings</a></li>
                            <li @routeactive('rooms.index')><a href="{{route('rooms.index')}}"><i class="fas
                            fa-booth-curtain"></i> Rooms</a></li>
                            <li><a href="{{route('bills.index')}}"><i class="fa-thin fa-money-bills"></i> Bills</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-4 person">
                    <a href="{{route('profile.edit')}}"><i class="fa-regular fa-address-card"></i> Profile</a>
                    <a href="{{route('logout')}}" class="delete"><i class="fa-regular fa-door-open"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>


@yield('content')

{{--<footer>--}}
{{--    <div class="copy">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <p>StayBook {{ date('Y') }}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src='{{route('index')}}/js/ru.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>

<style>
    .fc-day-grid-event .fc-time {
        display: none;
    }
</style>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let events = @json($events);
        let date = new Date();
        let today = date.setDate(date.getDate() - 1);
        $('#calendar').fullCalendar({
            header: {
                left: "prev,next today",
                center: "title",
                right: "month"
            },
            eventColor: '#960303',
            eventTextColor: '#fff',
            timezone: 'Asian/Bishkek',
            locale: 'ru',
            //eventOverlap: false,
            selectOverlap: false,
            events: events,
            selectable: true,
            longPressDelay: 0,
            selectHelper: true,
            validRange: {
                start: '2023-12-31',
                end: '2027-12-31'
            },
            select: function (start, end) {
                let start_d = $.fullCalendar.formatDate(start, "Y-MM-DD");
                let end_d = $.fullCalendar.formatDate(end, "Y-MM-DD");
                $("#start_d").val(start_d);
                $("#end_d").val(end_d);

                $("#show_modal").modal("show");

                $("#count, #countc").change(function(){
                    let price = $('#price').text();
                    let pricec = $('#pricec').text();
                    let count = $('#count').val();
                    let countc = $('#countc').val();
                    let start_d = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    let end_d = $.fullCalendar.formatDate(end, "Y-MM-DD");
                    let st = new Date(start_d);
                    let en = new Date(end_d);
                    let millisecondsPerDay = 1000 * 60 * 60 * 24;
                    let millisBetween = en.getTime() - st.getTime();
                    let days = millisBetween / millisecondsPerDay;
                    let sum = (price * count * days) + (pricec * countc * days);
                    $('#sum').val(sum + ' сом');
                });

                // $('select#room_id').change(function () {
                //     let optionSelected = $(this).find("option:selected");
                //     let room_id  = optionSelected.val();
                //     console.log(room_id);
                // });

                $('#saveBtn').click(function () {
                    let hotel_id = $(".modal").find('#hotel_id option:selected').val();
                    let room_id = $(".modal").find('#room_id option:selected').val();
                    let title = $(".modal").find("#title").val();
                    let phone = $(".modal").find("#phone").val();
                    let email = $(".modal").find("#email").val();
                    let comment = $(".modal").find("#comment").val();
                    let count = $(".modal").find("#count").val();
                    let countc = $(".modal").find("#countc").val();
                    let sum = $(".modal").find("#sum").val();
                    let status = $(".modal").find("#status").val();;
                    $.ajax({
                        url: "{{ route('listbooks.store') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: {hotel_id, room_id, title, phone, email, comment, count, countc, sum, status, start_d,
                            end_d},
                        success: function (response) {
                            Swal.fire({
                                title: 'Бронирование создано!',
                                //text: 'Do you want to continue',
                                icon: 'success',
                                confirmButtonText: 'Продолжить'
                            })
                        },
                        error: function (error) {
                            // if(error.responseJSON.errors){
                            //     $('#titleError').html(error.responseJSON.errors.title);
                            // }
                        }
                    });
                });
            },
            editable: true,
            eventDrop: function (event) {
                let id = event.id;
                let start_d = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                let end_d = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                $.ajax({
                    url: "{{ route('listbooks.update', '') }}" + '/' + id,
                    type: 'PATCH',
                    dataType: 'json',
                    data: {start_d, end_d},
                    success: function (response) {
                        Swal.fire({
                            title: 'Бронирование обновлено!',
                            //text: 'Do you want to continue',
                            icon: 'success',
                            confirmButtonText: 'Продолжить'
                        })
                    },
                    error: function (error) {
                        Swal.fire({
                            title: 'Ошибка!',
                            //text: 'Do you want to continue',
                            icon: 'error',
                            confirmButtonText: 'Ок'
                        })
                    }
                });
            },
            eventClick: function (event) {
                let id = event.id;
                if (confirm('Вы действительно хотите удалить?')) {
                    $.ajax({
                        url: "{{ route('listbooks.destroy', '') }}" + '/' + id,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (response) {
                            $('#calendar').fullCalendar('removeEvents', response);
                            Swal.fire({
                                title: 'Бронирование удалено!',
                                //text: 'Do you want to continue',
                                icon: 'success',
                                confirmButtonText: 'Продолжить'
                            })
                        },
                        // error: function (error) {
                        //     Swal.fire({
                        //         title: 'Ошибка!',
                        //         //text: 'Do you want to continue',
                        //         icon: 'error',
                        //         confirmButtonText: 'Ок'
                        //     })
                        // }
                    });
                }
            },
            eventRender: function (event, element) {
                element.find('.fc-title').append("<br/>Взрослые: " + event.count + "<br/>Дет: " + event.extra_place +
                "<br/>Телефон: " + event.phone);
        }
        {{--eventRender: function (event, element) {--}}
            {{--    element.find('.fc-title').append("<br/>" + event.phone + "<br/>" + event.email + "<br/>Коммент: " +--}}
            {{--        event.comment + "<br/>Кол-во: " + event.count + "<a href='{{ route('listbooks.edit', '') }}" +'/'+--}}
            {{--        event.id +"'>" + "<br/>" + "Редактировать" + "</a>");--}}
            {{--}--}}
        });
    });


    const input = document.querySelector("#phone");
    const output = document.querySelector("#output");

    const iti = window.intlTelInput(input, {
        nationalMode: true,
        initialCountry: 'kg',
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js" // just for formatting/placeholders etc
    });

    const handleChange = () => {
        let text;
        if (input.value) {
            text = iti.isValidNumber()
                ? "Действительный номер " + iti.getNumber()
                : "Неверный номер - попробуйте еще раз";
        } else {
            text = "Пожалуйста, введите действительный номер";
        }
        if (iti.isValidNumber()) {
            output.classList.add("agree");
            document.getElementById("saveBtn").disabled = false;
        } else {
            output.classList.remove("agree");
            document.getElementById("saveBtn").disabled = true;
        }
        const textNode = document.createTextNode(text);
        output.innerHTML = "";
        output.appendChild(textNode);
    };

    input.addEventListener('change', handleChange);
    input.addEventListener('keyup', handleChange);


</script>


</body>

</html>
