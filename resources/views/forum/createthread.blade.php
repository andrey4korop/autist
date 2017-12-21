@extends('layouts.lay')

@section('content')
    <h1 class="title">Forum</h1>
    {!! $breadcrumbs->render() !!}
    <div class="forum-content">
        <div class="channel">
            <div class="channel_title">
                <a href="{{route('channel', ['channel' => $channel->slug])}}">{{ $channel->name }}</a>
                <i class="fa fa-comment" aria-hidden="true"></i>
            </div>
            <form action="/{{Request::path()}}" class="forum_form forum_create_thread" method="POST">
                <div class="flex-rov">
                    <p style="margin-right: 10px;">Заголовок: </p>
                    <input type="text" name="title">
                </div>
                <p class="marg">Текст повыдомлення: </p>
                <textarea name="body" id="" cols="30" rows="10"></textarea>


                <input type="submit" value="Створити">
                {{ csrf_field() }}

                <input type="text" name="user_id">
            </form>
        </div>
    </div>
@endsection