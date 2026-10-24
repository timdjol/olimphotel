@extends('auth.layouts.master')

@section('title', 'Номер')

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
                        <div class="col-md-7">
                            <h1>Номер</h1>
                        </div>
                        <div class="col-md-5">
                            <a class="btn add" href="{{ route('rooms.create') }}">Добавить</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td><img src="{{ Storage::url($room->image) }}" alt="" width="100px"></td>
                                <td>{{ $room->title }}</td>
                                <td>{{ $room->price }} сом</td>
                                <td>
                                    <form action="{{ route('rooms.destroy', $room) }}" method="post">
                                        <ul>
                                            <li><a class="btn view" href="{{ route('rooms.show', $room)
                                            }}">Открыть</a></li>
                                            <li><a class="btn edit" href="{{ route('rooms.edit', $room)
                                            }}">Редактировать</a></li>
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
                    {{ $rooms->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

@endsection
