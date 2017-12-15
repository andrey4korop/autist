@extends('layouts.lay')

@section('content')
    <h1>{{$thisInt->title}}</h1>
    <img src="/{{$thisInt->main_img}}">
    {!!  $thisInt->content !!}


@endsection