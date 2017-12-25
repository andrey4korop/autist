@extends('layouts.lay')

@section('content')
    <h1 class="titleCont">{{$title}}</h1>
    <div class="contentOneColumn">
        @foreach($contents as $content)
            <div class="contentOne">
                <div class="col_left">
                    <a href="{{route($RouteName,['url' => $content->url])}}" class="title">
                        <img src="{{$content->youtube_img}}" alt="">
                    </a>
                </div>
                <div class="col_rigth">
                    <a href="{{route($RouteName,['url' => $content->url])}}" class="title">{{$content->title}}</a>
                </div>

            </div>
        @endforeach
    </div>
    {!! $contents->render() !!}

@endsection