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
                <table>
                    <thead>
                    <tr>
                        <th class="td1"></th>
                        <th class="left_align td2">Tema</th>
                        <th class="text td3">ost post</th>
                        <th class="td4">autor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($channel->threads as $thread)
                        <tr>
                            <td class="td1"><img src="/img/forum_nonew.png" alt=""></td>
                            <td class="left_align td2"><a href="{{route('replies', ['channel'=> $channel->slug, 'thread' =>$thread->id])}}">{{$thread->title}}</a></td>
                            <td class="left_align text td3">{{$thread->body}}</td>
                            <td class="td4">autor 1</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
                <div class="channel_more">
                    <a href="{{route('threads', ['channel' => $channel->slug])}}">ADD thread <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>


    </div>
@endsection