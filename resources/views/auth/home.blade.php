@extends('auth/layouts.master')

@section('title', 'Главная')

@section('content')

    <div class="page admin dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('auth/layouts.sidebar')
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
                            <div class="sliders">
                                <h2>Слайды</h2>
                                <p>Количество слайдов: {{ $sliders->count() }}</p>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Изображение</th>
                                        <th>Название</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <td><img src="{{ Storage::url($slider->image) }}" alt=""></td>
                                            <td>{{ $slider->title }}</td>
                                            <td>
                                                <form action="{{ route('sliders.destroy', $slider) }}" method="post">
                                                    <ul>
                                                        <li><a class="btn edit" href="{{ route('sliders.edit', $slider)
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
                                <a class="btn add" href="{{ route('sliders.create') }}">Добавить слайд</a>
                                {{ $sliders->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sliders">
                                <h2>Преимущества</h2>
                                <p>Количество: {{ $vantages->count() }}</p>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Изображение</th>
                                        <th>Название</th>
                                        <th>Название EN</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vantages as $vantage)
                                        <tr>
                                            <td><img src="{{ Storage::url($vantage->image) }}" alt="" width="100px"></td>
                                            <td>{{ $vantage->title }}</td>
                                            <td>{{ $vantage->title_en }}</td>
                                            <td>
                                                <form action="{{ route('vantages.destroy', $vantage) }}" method="post">
                                                    <ul>
                                                        <li><a class="btn edit" href="{{ route('vantages.edit', $slider)
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
                                <a class="btn add" href="{{ route('vantages.create') }}">Добавить</a>
                                {{ $vantages->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="faqs" style="margin-top: 40px">
                                <h2>Вопросы-ответы</h2>
                                <p>Количество: {{ $faqs->count() }}</p>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Вопрос</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($faqs as $faq)
                                        <tr>
                                            <td>{{ $faq->title }}</td>
                                            <td>
                                                <form action="{{ route('faqs.destroy', $faq) }}" method="post">
                                                    <ul>
                                                        <li><a class="btn edit" href="{{ route('faqs.edit', $faq)
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
                                <a class="btn add" href="{{ route('faqs.create') }}">Добавить</a>
                                {{ $faqs->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
