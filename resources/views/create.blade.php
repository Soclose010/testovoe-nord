@extends('main')

@section('title', 'Добавление записи')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Добавление записи</h2>
        <form class="w-50 m-auto mb-5" action="{{ route('store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Имя пользователя</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    placeholder="Имя пользователя" name="username" value="{{ old('username') }}" required>
                @error('username')
                    <div class="alert alert-danger mt-2">
                        @foreach ($errors->get('username') as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Электронная почта</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="Электронная почта" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Текст</label>
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30"
                    rows="10" required>{{ old('body') }}</textarea>
                @error('body')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="captcha" class="form-label">CAPTCHA</label>
                <div>
                    {!! captcha_img() !!}
                </div>
                <input type="text" class="form-control w-25 mt-3 @error('captcha') is-invalid @enderror" id="captcha"
                    name="captcha" required>
                @error('captcha')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary d-block m-auto">Добавить</button>
        </form>
    </div>
@endsection
