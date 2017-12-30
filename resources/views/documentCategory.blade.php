@extends('layouts.lay')

@section('content')
    <h1 class="titleCont">Доступ до документiв та матерiалiв</h1>
    {!! $breadcrumbs->render() !!}
    <div class="books">
        @foreach($content as $ssilka)
        <div class="book">
            <a href="{{$ssilka['url']}}">
                <img src="https://autism.ua/wp-content/uploads/2017/04/0101001.png" alt="">
                <p>{{$ssilka['title']}}</p>
            </a>
        </div>
        @endforeach



    </div>
@endsection