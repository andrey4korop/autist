@extends('layouts.lay')

@section('content')
   {{-- dbdид списка категорий, каналов и т.д. --}}

    @if(isset($channels))
        <ul>
        <li role="separator" class="divider"></li>
        @foreach ($channels as $channel)
        <li><a href="{{route('channel', ['channel' => $channel->slug])}}">{{ $channel->name }}</a></li>
        @endforeach
    </ul>
@endif
   @if(isset($channels2))
   <ul>
       <li role="separator" class="divider"></li>

       @foreach ($channels2 as $channel)

           <li><a href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a></li>
           @forelse($channel->threads as $thread)
               <li>{{$thread->title}}</li>
           @empty
           @endforelse
       @endforeach
   </ul>
   @endif

   @if(isset($channels3))
       <ul>
           <li role="separator" class="divider"></li>

         <li>{{$channels3->name}}</li>
           @forelse($channels3->threads as $threads)
               <li>{{$threads->title}}</li>
           @empty
           @endforelse
       </ul>
   @endif



@endsection