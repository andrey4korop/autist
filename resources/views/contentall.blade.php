@extends('layouts.lay')

@section('content')
    <h1 class="titleCont">{{$title}}</h1>
    <div class="contentAll">
    @foreach($contents as $content)
        <div class="contentOne">
            <a href="{{route($RouteName,['url' => $content->url])}}" class="title">{{$content->title}}</a>
            <img src="{{$content->main_img}}" alt="">
            <p class="description">{{substr(rtrim(substr(strip_tags($content->content), 0, 400), "!,.-"), 0, strrpos(rtrim(substr(strip_tags($content->content), 0, 400), "!,.-"), ' '))}}...</p>
            <a href="{{route($RouteName,['url' => $content->url])}}" class="read_more">Читати далi</a>
        </div>
    @endforeach
    </div>
    {!! $contents->render() !!}
@endsection