@extends('layouts.lay')

@section('content')
    <h1 class="titleCont">Доступ до документiв та матерiалiв</h1>
    {!! $breadcrumbs->render() !!}
    <div class="documents">
        <ul>
        @foreach($content->documents as $document)
            <li><a href="/{{$document->path_file}}">{{$document->title}}</a></li>
        @endforeach
        </ul>
    </div>
@endsection