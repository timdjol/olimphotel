@extends('auth.layouts.master')

@section('title', 'Заявки с экскурсий')

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    @if(session()->has('success'))
                        <p class="alert alert-success">{{ session()->get('success') }}</p>
                    @endif
                    @if(session()->has('warning'))
                        <p class="alert alert-warning">{{ session()->get('warning') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Заявки с экскурсий</h1>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Экскурсия</th>
                            <th>Тип</th>
                            <th>Дата</th>
                            <th>Кол-во</th>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->travel }}</td>
                                <td>{{ $order->choose }}</td>
                                <td>{{ $order->dates }}</td>
                                <td>{{ $order->count }}</td>
                                <td>{{ $order->name }}</td>
                                <td><a href="tel:{{ $order->phone }}">{{ $order->phone }}</a></td>
                                <td><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></td>
                                <td>
                                    <form action="{{ route('orders.destroy', $order) }}" method="post">
                                        <ul>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn delete">Удалить</button>
                                        </ul>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <style>
        table th, table td{
            font-size: 14px;
            line-height: 1.2;
            padding: 5px;
        }
        .admin table ul{
            padding-left: 0;
        }
        table a{
            color: #009291;
            text-decoration: none;
        }
    </style>

@endsection
