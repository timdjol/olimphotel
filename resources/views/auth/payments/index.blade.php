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
                    <h1>Способы оплаты</h1>
                    @if(!$payments->isEmpty())
                    <table>
                        <tr>
                            <th>Способы оплаты</th>
                            <th>Действия</th>
                        </tr>
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->payments }}</td>
                                <td><a href="{{ route('payments.edit', $payment) }}" class="more"><i class="fa-regular
                                fa-pen-to-square"></i></a></td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <div class="btn-wrap" style="margin-top: 20px">
                            <a href="{{ route('payments.create') }}" class="more">Добавить</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
