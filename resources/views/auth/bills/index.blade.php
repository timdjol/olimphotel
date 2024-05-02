@extends('auth.layouts.master')

@section('title', 'Счета')

@section('content')

    <div class="page admin bills">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <h1>Соглашение</h1>
                    @if(!$bills->isEmpty())
                    <table>
                        <tr>
                            <th>№</th>
                            <th>Дата заключения</th>
                            <th>Статус</th>
                            <th>Компания</th>
                            <th>Файлы</th>
                            <th>Действия</th>
                        </tr>
                        <tbody>
                        @foreach($bills as $bill)
                            <tr>
                                <td>{{ $bill->id }}</td>
                                <td>{{ $bill->date }}</td>
                                <td>
                                    @if($bill->status==1)
                                        <div class="status"><i class="fa-regular fa-check"></i> Активный</div>
                                    @else

                                    @endif
                                </td>
                                <td>{{ $bill->title }}</td>
                                <td>
                                    <div class="file"><a target="_blank" href="{{ Storage::url($bill->file1)
                                    }}">Agreement
                                            StayBook</a></div>
                                    <div class="file"><a target="_blank" href="{{ Storage::url($bill->file2)
                                    }}">StayBook
                                            Rules and
                                            Procedures</a></div>
                                </td>
                                <td>
                                    <form action="{{ route('bills.destroy', $bill) }}" method="post">
                                        <ul>
                                            <li><a class="btn edit" href="{{ route('bills.edit', $bill)
                                            }}"><i class="fa-regular fa-pen-to-square"></i></a></li>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn delete"><i class="fa-regular fa-trash"></i></button>
                                        </ul>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="btn-wrap" style="margin-top: 20px">
                            <a href="{{ route('bills.create') }}" class="more">Заключить договор</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
