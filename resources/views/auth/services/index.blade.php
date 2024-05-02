@extends('auth.layouts.master', compact('hotel'))

@section('title', 'Удобства и услуги')

@section('content')


    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <h1>Удобства и услуги</h1>
                    @if(!$services->isEmpty())
                    <table>
                        <tr>
                            <th>Услуги</th>
                            <th>Действия</th>
                        </tr>
                        @foreach($services as $service)

                            <tr>
                                <td>{{ $service->services }}</td>
                                <td><a href="{{ route('services.edit', $service) }}" class="more"><i class="fa-regular fa-pen-to-square"></i></a></td>
                            </tr>
                        @endforeach

                    </table>
                    @else
                        <div class="btn-wrap" style="margin-top: 20px">
                            <a href="{{ route('services.create') }}" class="more">Добавить</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
