@extends('layouts.lay')

@section('content')
    <h1>{{$new->title}}</h1>
    <img src="/{{$new->main_img}}">
    {!!  $new->content !!}


@endsection