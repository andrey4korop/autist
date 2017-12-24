@extends('layouts.lay')

@section('content')
    <h1>{{$content->title}}</h1>
    <img src="/{{$content->main_img}}">
    {!!  $content->content !!}

    @include('vendor.socialshare.social', ['object' => $content])

    @include('comments.comments_block', ['essence' => $content])

@endsection