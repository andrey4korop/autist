@extends('layouts.lay')

@section('content')
    <form class="form_login" method="POST" action="{{ route('register') }}">
        <h3 class="">Register</h3>
        {{ csrf_field() }}
        <p class="label">Ім'я</p>
        <input type="text" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span class="red">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <p class="label">Електронна пошта</p>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="red">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <p class="label">Пароль</p>
        <input type="password" name="password" required>
        @if ($errors->has('password'))
            <span class="red">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <p class="label">Підтвердіть пароль</p>
        <input type="password" class="label" name="password_confirmation" required>
        <button type="submit">Реестрація</button>
    </form>
@endsection
