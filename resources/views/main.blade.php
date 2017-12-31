@extends('layouts.lay')

@section('content')

    <div class="social">
        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-rss" aria-hidden="true"></i></a>
    </div>
    <div class="ads">
        <div class="ads_content"><img src="/img/ads.png" alt=""></div>
        <div class="ads_content"><img src="/img/ads.png" alt=""></div>
        <div class="ads_content"><img src="/img/ads.png" alt=""></div>
    </div>
    <div class="top_menu">
        @each('vendor.menu.top_menu', App\TopMenu::with('page')->orderBy('_lft')->get(), 'menu')
    </div>
    <div class="slider">
        <img src="/img/slider_001.jpg" alt="">
    </div>
    @if(!Auth::check())
    <div class="login">
        <form action="">
            <a href="{{route('login')}}">Увійти</a>
            <a href="{{route('register')}}" id="registration">Реєстрація</a>
        </form>
    </div>
    @endif
    <div class="block block_1">
        <div class="this_interesting">
            <h1>ЦЕ ВАЖЛИВО</h1>
            <div class="this_interesting_block">
                <a href="{{route('vazlivoAll')}}" class="read_all">Читати все</a>
                <div class="flex-rov">
                    @if(!empty($ThisInt->main_img))
                    <a href="{{route('vazlivo',['url' => $ThisInt->url])}}"><img src="{{$ThisInt->maim_img}}" alt=""></a>
                    @endif
                    <div class="flex-column jc-sb">
                        <a href="{{route('vazlivo',['url' => $ThisInt->url])}}" class="title">{{$ThisInt->title}}</a>
                        <a href="{{route('vazlivo',['url' => $ThisInt->url])}}" class="read_more">Читати далi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="video">
            <h1>ВІДЕО</h1>
            <div class="video_content">
                @foreach($Medias as $media)
                <a href="{{route('media', ['slug' => $media->url])}}"><img src="{{$media->youtube_img}}" alt=""></a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="block flex-column">
        <h1>ОСТАННІ НОВИНИ</h1>
        <a href="{{route('newAll')}}" class="read_all">Читати все</a>
        <div class="news flex-row jc-sb">
            @foreach($news as $new)
            <div class="new">
                <img src="/{{$new->main_img}}" alt="">
                <a href="" class="date">{{$new->created_at->format('d.m.Y')}}</a>
                <a href="{{route('new',['url' => $new->url])}}" class="title">{{$new->title}}</a>
                <p class="description">{{substr(rtrim(substr(strip_tags($new->content), 0, 400), "!,.-"), 0, strrpos(rtrim(substr(strip_tags($new->content), 0, 400), "!,.-"), ' '))}}...</p>
                <a href="{{route('new',['url' => $new->url])}}" class="read_more">Читати далi</a>
            </div>
            @endforeach
        </div>

    </div>
    <div class="block block2">
        <div class="col-6 block2_left">
            <div>
                <a href=""><img src="img/img2.jpg" alt=""></a>
                <a href=""><img src="img/img2.jpg" alt=""></a>
                <a href=""><img src="img/img2.jpg" alt=""></a>
                <a href=""><img src="img/img2.jpg" alt=""></a>
            </div>
            <form action="{{route('subscribe')}}" method="post" class="podpiska">
                {{ csrf_field()}}
                <p class="pre_h">ОФОРМИТИ ПІДПИСКУ</p>
                <h1>НА РОЗСИЛКУ НОВИН</h1>
                <p>При оформленні пидписки, ми будемо відсилати оформлену збірку новин та статей на вашу почтову скриньку.</p>
                <p class="label">Введіть ФІО</p>
                <input type="text" name="name">
                <p class="label">Введіть свій e-mail *</p>
                <input type="text" name="email">
                <input type="submit" value="Оформити підписку">
            </form>
        </div>
        <div class="col-6 block2_right">
            <h1>БЛОГ</h1>
            <a href="{{route('blogAll')}}" class="read_all">Читати все</a>
            <div class="blogs">
                @foreach($blogs as $blog)
                <div class="blog">
                    <a href="{{route('blog',['url' => $blog->url])}}" class="title">{{$blog->title}}</a>
                    <a class="author">{{$blog->author->name}}</a>
                    <a class="date">{{$blog->created_at->format('d.m.Y')}}</a>
                    <img src="{{$blog->main_img}}" alt="">
                    <p class="description">{{substr(rtrim(substr(strip_tags($blog->content), 0, 400), "!,.-"), 0, strrpos(rtrim(substr(strip_tags($blog->content), 0, 400), "!,.-"), ' '))}}...</p>
                    <a href="{{route('blog',['url' => $blog->url])}}" class="read_more">Читати далi</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="block books_block">
        <h1>ПОСІБНИКИ</h1>
        <p>для завантаження натисніть на одну з наступних категорій</p>
        <div class="block">

            <div class="col-6">
                <a href="{{route('books', ['url' => $CategoryBook->first()->url])}}">
                    <img src="/img/pos1.jpg" alt="">
                </a>
            </div>
            <div class="col-6">
                <a href="{{route('books', ['url' => $CategoryBook->last()->url])}}">
                    <img src="/img/pos2.jpg" alt="">
                </a>
            </div>

        </div>
    </div>
    <div class="block calendar">
        <p class="pre_h">ПЕРЕГЛЯНЬТЕ НАШ КАЛЕНДАР</p>
        <h1>АНОНСІВ</h1>
        <p>ви також маєте можливість записатись</p>
        <div class="calendar_block">
            {!! $calendar->calendar() !!}
            {!! $calendar->script() !!}
        </div>
    </div>
    <div class="block block_forum">
        <h1>ФОРУМ</h1>
        <p>оберіть один з топиків нашого форуму</p>
        <div class="forum">
            @foreach($Channels as $Channel)
            <a href="{{route('channel', ['channel' => $Channel->slug])}}" class="forum_category">
                <i class="fa fa-podcast" aria-hidden="true"></i>
                <p>{{$Channel->name}}</p>
            </a>
            @endforeach

        </div>
    </div>
    @if(!Auth::check())
    <div class="block login">
        <div class="message">
            <p>Ви повинні увійти в систему для перегляду цієї сторінки</p>
        </div>
        <form action="">
            <a href="{{route('login')}}">Увійти</a>
            <a href="{{route('register')}}" id="registration">Реєстрація</a>
        </form>
    </div>
    @endif

@endsection