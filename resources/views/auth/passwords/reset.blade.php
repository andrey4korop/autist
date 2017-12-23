@extends('layouts.lay')

@section('content')
    <form class="form_login" method="POST" action="{{ route('password.request') }}">
        <h3 class="">Reset Password</h3>
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">


        <p class="label">Електронна пошта</p>
        <input type="email" name="email" value="{{ $email or old('email') }}" required>
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