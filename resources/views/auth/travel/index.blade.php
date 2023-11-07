@extends('auth.layouts.master')

@section('title', 'Экскурсия')

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
                            <h1>Экскурсии</h1>
                        </div>
                        <div class="col-md-5">
                            <a class="btn add" href="{{ route('travel.create') }}">Добавить</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($travel as $trav)
                            <tr>
                                <td><img src="{{ Storage::url($trav->image) }}" alt="" width="100px"></td>
                                <td>{{ $trav->title }}</td>
                                <td>
                                    <form action="{{ route('travel.destroy', $trav) }}" method="post">
                                        <ul>
                                            <li><a class="btn view" href="{{ route('travel.show', $trav)
                                            }}">Открыть</a></li>
                                            <li><a class="btn edit" href="{{ route('travel.edit', $trav)
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
                    {{ $travel->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

@endsection
