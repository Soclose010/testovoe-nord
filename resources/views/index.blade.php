@extends('main')

@section('title', 'Гостевая книга')
@section('content')
    <div class="container mt-2">
        <div class="row justify-content-center">
            <h1 class="text-center">Гостевая книга</h1>
            <a href="{{ route('create') }}" class="btn btn-success fit-content">Добавить запись </a>
            <div class="mt-2">
                <p class="text-center">Фильтры</p>
            </div>
        </div>
        <form class="w-25 m-auto" action="{{ route('home') }}" method="GET">
            @foreach ($sortDto as $key => $value)
                <div class="mb-3">
                    @include('select', ['name' => $key, 'value' => $value])
                </div>
            @endforeach
            <button type="submit" class="d-block btn btn-primary m-auto mb-3">Сортировать</button>
            <a class="d-block fit-content btn btn-danger m-auto" href="{{ route('home') }}">Сброс</a>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Имя пользователя</th>
                    <th scope="col">Электронная почта</th>
                    <th scope="col">Текст</th>
                    <th scope="col">Дата добавления</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                    <div>
                        @include('entry', compact('entry'))
                    </div>
                @endforeach
            </tbody>
        </table>
        <div class="fit-content m-auto mb-4">
            {{ $entries->withQueryString()->links() }}
        </div>
    </div>
@endsection
