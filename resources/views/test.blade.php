@extends('layouts.lay')

@section('content')
    <ul>
        <li role="separator" class="divider"></li>
        @foreach ($channels as $channel)
        <li><a href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a></li>
        @endforeach
        </ul>





@endsection