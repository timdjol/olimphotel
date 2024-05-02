
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
            @if($room->hotel->breakfast != '')
                <div class="breakfast">@lang('main.breakfast')</div>
            @endif
        </div>
    </div>
