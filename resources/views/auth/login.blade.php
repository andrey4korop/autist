@extends('layouts.lay')

@section('content')

    <form class="form_login" method="POST" action="{{ route('login') }}">
        <h3 class="">Увійти</h3>
        {{ csrf_field() }}

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
        <div class="flex-rov">
         <p class="label">Зам'ятати</p>
            <label for="cbx" class="label-cbx">
                <input type="checkbox" id="cbx" name="remember" class="invisible" {{ old('remember') ? 'checked' : '' }}>
                <div class="checkbox">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                        <polyline points="4 11 8 15 16 6"></polyline>
                    </svg>
                </div>
            </label>
        </div>
        <div class="flex-rov jc-sb">
            <button type="submit">Увійти</button>
            <a class="btn" href="{{ route('password.request') }}">Забули пароль?</a>
        </div>
    </form>

@endsection
