@extends('layouts.lay')

@section('content')
    <h1 class="titleCont">{{$content->title}}</h1>
    <div class="youtube-embed-wrapper">
        <iframe allowfullscreen="" frameborder="0"
                src="https://www.youtube.com/embed/{{$content->youtube_id}}"
                style="
                    position:absolute;
                    top:0;
                    left:0;
                    width:100%;
                    height:100%"></iframe>
    </div>

    @include('vendor.socialshare.social', ['object' => $content])

    @include('comments.comments_block', ['essence' => $content])

@endsection