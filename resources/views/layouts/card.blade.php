
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
                <div class="price">${{ $room->price }}</div>
                @if($room->hotel->breakfast != '')
                    <div class="breakfast">@lang('main.breakfast')</div>
                @endif
            </div>
            <div class="btn-wrap">
                <a href="{{ route('room', [isset($hotel) ? $hotel->code : $room->hotel->code, $room->code])
            }}" class="more">@lang('main.more')</a>
            </div>
        </div>
        <div class="col-lg-2 d-xl-block d-lg-block d-none" data-aos="fade-left" data-aos-duration="2000">
            <div class="price">${{ $room->price }}</div>
                @if($room->hotel->include == 'AI')
                <div class="breakfast" title="All inclusive">AI</div>
                @elseif($room->hotel->include == 'BB')
                <div class="breakfast" title="Breakfast">BB</div>
                @elseif($room->hotel->include == 'FB')
                <div class="breakfast" title="Full board (breakfast, lunch and dinner)">FB</div>
                @elseif($room->hotel->include == 'RO')
                <div class="breakfast" title="Room only">RO</div>
                @elseif($room->hotel->include == 'HB')
                <div class="breakfast" title="Half Board (breakfast and lunch or dinner)">HB</div>
                @else
                @endif
            @if($room->hotel->early_in != '')
                <div class="early">@lang('main.early')</div>
            @endif
            @if($room->hotel->cancelled == 0 || $room->hotel->cancelled == '')
                <div class="early">@lang('main.cancelled')</div>
            @endif
        </div>
    </div>

    <style>
        .rooms .breakfast{
            background-color: #0163b4;
            color: #fff;
            border-radius: 5px;
            padding: 5px 10px;
            display: inline-block;
            opacity: 1;
        }
    </style>
