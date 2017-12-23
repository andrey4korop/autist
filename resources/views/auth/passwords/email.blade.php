@extends('layouts.lay')

@section('content')


    <form class="form_login" method="POST" action="{{ route('password.email') }}">
        <h3 class="">Відновлення доступу</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        {{ csrf_field() }}

        <p class="label">Електронна пошта</p>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="red">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <button type="submit">Відновити</button>

    </form>




@endsection
