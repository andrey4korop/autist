@extends('layouts.lay')

@section('content')
    <h1 class="titleCont">{{$content->title}}</h1>
    <div class="books">

        @foreach($content->books as $book)
        <div class="book">
            <a href="/{{$book->path_file}}">
                <img src="https://autism.ua/wp-content/uploads/2017/04/0101001.png" alt="">
                <p>{{$book->title}}</p>
            </a>
        </div>
        @endforeach
    </div>
@endsection