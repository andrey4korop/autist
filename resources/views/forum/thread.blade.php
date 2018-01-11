@extends('layouts.lay')

@section('content')
    <h1 class="title">{{$title}}</h1>
    {!! $breadcrumbs->render() !!}

    <div class="forum-content">
        <div class="reply">
            <div class="author_block">
                <p class="author_name">{{$threads->author->name}}</p>
                <img src="/{{$threads->author->profile->avatar}}">
                <p>Заеєстрований {{$threads->author->created_at->format('d.m.Y')}}</p>
                <p>Постів {{$threads->author->countPost()}}</p>
            </div>
            <div class="reply_content">
                <div class="forum_date">
                    <p>{{$threads->created_at->format('d.m.Y H:m:s')}}</p>
                    {{--<a href="">[Цитировать]</a>--}}
                </div>
                <div class="forum_text">
                    <p>{{$threads->body}}</p>
                </div>
            </div>
        </div>
        @forelse($replies as $replie)
        <div class="reply">
            <div class="author_block">
                <p class="author_name">{{$replie->author->name}}</p>
                <img src="/{{$replie->author->profile->avatar}}">
                <p>Заеєстрований {{$replie->author->created_at->format('d.m.Y')}}</p>
                <p>Постів {{$replie->author->countPost()}}</p>
            </div>
            <div class="reply_content">
                <div class="forum_date">
                    <p>{{$replie->created_at->format('d.m.Y H:m:s')}}</p>
                    {{--<a href="">[Цитировать]</a>--}}
                </div>
                <div class="forum_text">
                    <p>{!! $replie->body !!}</p>
                </div>
            </div>
        </div>
        @empty
        @endforelse

       {{-- <div class="reply">
            <div class="author_block">
                <p class="author_name">author 1</p>
                <img src="http://autyzmwpolsce.pl/img/avatars/default.png" alt="">
                <p>Зарегестирован 22.10.2017</p>
                <p>postow 55</p>
            </div>
            <div class="reply_content">
                <div class="forum_date">
                    <p>date</p>
                    <a href="">[Цитировать]</a>
                </div>
                <div class="forum_text">
                    <div class="quote">
                        <div class="quote_author">
                            <p>nik4832 писал(а):</p>
                        </div>
                        <div class="forum_text">
                            <div class="quote">
                                <div class="quote_author">
                                    <p>nik4832 писал(а):</p>
                                </div>
                                <div class="forum_text">
                                    <div class="quote">
                                        <div class="quote_author">
                                            <p>nik4832 писал(а):</p>
                                        </div>
                                        <div class="forum_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci amet asperiores assumenda at consectetur consequatur cupiditate dolorem et ex explicabo facere id impedit ipsa iusto laborum laudantium minima natus nobis nostrum odit officiis omnis, pariatur perspiciatis quaerat quam quasi quod repellendus reprehenderit repudiandae sequi sunt tempora ut vel voluptatum.</p>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam asperiores assumenda atque doloremque ea iure iusto minima molestias, nemo obcaecati qui quibusdam ratione reiciendis sequi, temporibus voluptas voluptatem voluptatibus? Dolores fugit iure modi officiis placeat quasi qui quia sint sit tempore. Dolores et optio quisquam rerum soluta. Et iure, porro?</p>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam asperiores assumenda atque doloremque ea iure iusto minima molestias, nemo obcaecati qui quibusdam ratione reiciendis sequi, temporibus voluptas voluptatem voluptatibus? Dolores fugit iure modi officiis placeat quasi qui quia sint sit tempore. Dolores et optio quisquam rerum soluta. Et iure, porro?</p>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam asperiores assumenda atque doloremque ea iure iusto minima molestias, nemo obcaecati qui quibusdam ratione reiciendis sequi, temporibus voluptas voluptatem voluptatibus? Dolores fugit iure modi officiis placeat quasi qui quia sint sit tempore. Dolores et optio quisquam rerum soluta. Et iure, porro?</p>
                </div>
            </div>
        </div>--}}
        {!! $replies->render() !!}
    </div>
    <form action="/{{Request::path()}}" class="forum_form" method="POST">
        <h1>Быстрый ответ</h1>
        <textarea name="body" id="" cols="30" rows="10"></textarea>

        <input type="submit">
        {{ csrf_field() }}
    </form>
@endsection