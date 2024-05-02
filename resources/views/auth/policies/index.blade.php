@extends('auth.layouts.master')

@section('title', 'Способы оплаты')

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <h1>Политика</h1>
                    @if(!$policies->isEmpty())
                    <table>
                        <tr>
                            <th>Ранний въезд</th>
                            <th>Поздний выезд</th>
                            <th>Доп место</th>
                            <th>Наценка</th>
                            <th>Действия</th>
                        </tr>
                        @foreach($policies as $policy)
                            <tr>
                                <td>{{ $policy->checkin }}</td>
                                <td>{{ $policy->checkout }}</td>
                                <td>{{ $policy->extra }}</td>
                                <td>{{ $policy->amount }}</td>
                                <td><a href="{{ route('policies.edit', $policy) }}" class="more"><i class="fa-regular
                                fa-pen-to-square"></i></a></td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <div class="btn-wrap" style="margin-top: 20px">
                            <a href="{{ route('policies.create') }}" class="more">Добавить</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
