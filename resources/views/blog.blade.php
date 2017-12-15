@extends('layouts.lay')

@section('content')
    <h1>{{$blog->title}}</h1>
    <img src="/{{$blog->main_img}}">
    {!!  $blog->content !!}


@endsection