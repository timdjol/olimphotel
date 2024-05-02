@extends('auth.layouts.master')

@isset($policy)
    @section('title', 'Редактировать страницу')
@else
    @section('title', 'Создать страницу')
@endisset

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <h1>Способы оплаты</h1>
                    <form method="post"
                          @isset($policy)
                              action="{{ route('policies.update', $policy) }}"
                          @else
                              action="{{ route('policies.store') }}"
                            @endisset>
                        @isset($policy)
                            @method('PUT')
                        @endisset
                        <input type="hidden" name="hotel_id" value="{{ $hotel }}">
                        <div class="form-group">
                            <label for="">Ранний въезд</label>
                            <select name="checkin" id="">
                                <option value="02:00">02:00</option>
                                <option value="03:00">03:00</option>
                                <option value="04:00">04:00</option>
                                <option value="05:00">05:00</option>
                                <option value="06:00">06:00</option>
                                <option value="07:00">07:00</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Поздний выезд</label>
                            <select name="checkout" id="">
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:00">19:00</option>
                                <option value="20:00">20:00</option>
                                <option value="21:00">21:00</option>
                                <option value="22:00">22:00</option>
                                <option value="23:00">23:00</option>
                            </select>
                        </div>
                        @include('auth.layouts.error', ['fieldname' => 'extra'])
                        <div class="form-group">
                            <label for="">Дополнительное место</label>
                            <input type="number" name="extra" value="{{ old('extra', isset($policy) ?
                            $policy->extra : null) }}">
                        </div>
                        @include('auth.layouts.error', ['fieldname' => 'amount'])
                        <div class="form-group">
                            <label for="">Наценка</label>
                            <input type="number" name="amount" value="{{ old('amount', isset($policy) ?
                            $policy->amount : null) }}">
                        </div>
                        @csrf
                        <button class="more">Отправить</button>
                        <a href="{{url()->previous()}}" class="btn delete cancel">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .admin label {
            display: inline-block;
        }
    </style>

@endsection
