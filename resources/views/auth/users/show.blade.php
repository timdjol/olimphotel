@extends('auth.layouts.master')

@section('title', 'Пользователь ' . $user->name)

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <h1>Пользователи</h1>
                    <table>
                        <tr>
                            <th>ФИО</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Роль пользователя</th>
                            <td>
                                @if($user->is_admin == 1)
                                    Администратор
                                @elseif($user->is_admin == 2)
                                    Менеджер
                                @elseif($user->is_admin == 3)
                                    Бухгалтер
                                @elseif($user->is_admin == 4)
                                    Менеджер Отеля
                                @else
                                    Пользователь
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
