@extends('layouts.lay')

@section('content')
    <h1 class="title">{{$title}}</h1>
    {!! $breadcrumbs->render() !!}
    <div class="forum-content">
        @foreach ($channels as $channel)
        <div class="channel">
            <div class="channel_title">
                <a href="{{route('channel', ['channel' => $channel->slug])}}">{{ $channel->name }}</a>
                <i class="fa fa-comment" aria-hidden="true"></i>
            </div>
            <table>
                <thead>
                <tr>
                    <th class="td1"></th>
                    <th class="left_align td2">Тема</th>
                    <th class="text td3">Останнє повідомлення</th>
                    <th class="td4">Автор</th>
                </tr>
                </thead>
                <tbody>
                @forelse($channel->threads as $thread)
                <tr>
                    <td class="td1"><i class="fa fa-newspaper-o" aria-hidden="true"></i></td>
                    <td class="left_align td2"><a href="{{route('replies', ['channel'=> $channel->slug, 'thread' =>$thread->id])}}">{{$thread->title}}</a></td>
                    <td class="left_align text td3">{{strip_tags($thread->replies->isEmpty() ? $thread->body : $thread->replies->last()->body)}}</td>
                    <td class="td4">{{$thread->author->name}}</td>
                </tr>
                @empty
                @endforelse
                </tbody>
            </table>
            <div class="channel_more">
                <a href="{{route('channel', ['channel' => $channel->slug])}}">Більше <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        @endforeach

    </div>
@endsection