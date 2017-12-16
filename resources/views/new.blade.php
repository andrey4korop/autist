@extends('layouts.lay')

@section('content')
    <h1>{{$new->title}}</h1>
    <img src="/{{$new->main_img}}">
    {!!  $new->content !!}

<?php
$share = Share::load(route('new', ['url' => $new->url]), $new->title, $new->maim_img)->services();
?>

    <ul id="social_share">
        <li class="facebook">
            <a href="{{$share['facebook']}}" title=""  target="_blank">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <span>Facebook</span>
            </a>
        </li>
        <li class="messenger">
            <a href="https://www.facebook.com/dialog/send?app_id=&amp;link=https://autism.ua/muzykoterapiia-vid-ievhena-khmary-blahodiinyi-kontsert-muzyka-shcho-stsiliuie/&amp;redirect_uri=https://facebook.com" title="" onclick="essb_window('https://www.facebook.com/dialog/send?app_id=&amp;link=https://autism.ua/muzykoterapiia-vid-ievhena-khmary-blahodiinyi-kontsert-muzyka-shcho-stsiliuie/&amp;redirect_uri=https://facebook.com','messenger','1470492810'); return false;" target="_blank" rel="nofollow">
                <span class="essb_icon essb_icon_messenger"></span>
                <span>FB Messenger</span>
            </a>
        </li>
        <li class="vk">
            <a href="{{$share['vk']}}" title="" target="_blank" rel="nofollow">
                <i class="fa fa-vk" aria-hidden="true"></i>
                <span>VKontakte</span>
            </a>
        </li>
        <li class="google-plus">
            <a href="{{$share['gplus']}}" title="" target="_blank" rel="nofollow">
                <i class="fa fa-google-plus" aria-hidden="true"></i>
                <span>Google+</span>
            </a>
        </li>
        <li class="twitter">
            <a href="{{$share['twitter']}}" title="" target="_blank" rel="nofollow">
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <span>Twitter</span>
            </a>
        </li>
        <li class="pinterest">
            <a href="{{$share['pinterest']}}" title="" target="_blank" rel="nofollow">
                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                <span>Pinterest</span>
            </a>
        </li>
        <li class="linkedin">
            <a href="{{$share['linkedin']}}" title="" target="_blank" rel="nofollow">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
                <span>LinkedIn</span>
            </a>
        </li>
        <li class="telegram">
            <a href="tg://msg?text=Музикотерапія%20від%20Євгена%20Хмари%20.%20Благодійний%20концерт%20%22Музика%2C%20що%20сцілює%22.%20https%3A%2F%2Fautism.ua%2Fmuzykoterapiia-vid-ievhena-khmary-blahodiinyi-kontsert-muzyka-shcho-stsiliuie%2F" title="" onclick="essb_tracking_only('', 'telegram', '1470492810', true);" target="_blank" rel="nofollow">
                <i class="fa fa-telegram" aria-hidden="true"></i>
                <span>Telegram</span>
            </a>
        </li>
        <li class="viber">
            <a href="viber://forward?text=Музикотерапія%20від%20Євгена%20Хмари%20.%20Благодійний%20концерт%20%22Музика%2C%20що%20сцілює%22.%20https%3A%2F%2Fautism.ua%2Fmuzykoterapiia-vid-ievhena-khmary-blahodiinyi-kontsert-muzyka-shcho-stsiliuie%2F" title="" onclick="essb_tracking_only('', 'viber', '1470492810', true);" target="_blank" rel="nofollow">
                <span class="essb_icon essb_icon_viber"></span>
                <span>Viber</span>
            </a>
        </li>
        <li class="whatsapp">
            <a href="{{$share['whatsapp']}}" title="" target="_self" rel="nofollow">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                <span>WhatsApp</span>
            </a>
        </li>
        <li class="print">
            <a href="#" title="" onclick="essb_print('1470492810'); return false;" target="_blank" rel="nofollow">
                <i class="fa fa-print" aria-hidden="true"></i>
                <span>Print</span>
            </a>
        </li>
        <li class="envelope">
            <a href="{{$share['email']}}" title="" target="_blank" rel="nofollow">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>Email</span>
            </a>
        </li>
        <li class="skype">
            <a href="https://web.skype.com/share?url=https://autism.ua/muzykoterapiia-vid-ievhena-khmary-blahodiinyi-kontsert-muzyka-shcho-stsiliuie/" title="" onclick="essb_window('https://web.skype.com/share?url=https://autism.ua/muzykoterapiia-vid-ievhena-khmary-blahodiinyi-kontsert-muzyka-shcho-stsiliuie/','skype','1470492810'); return false;" target="_blank" rel="nofollow">
                <i class="fa fa-skype" aria-hidden="true"></i>
                <span>Skype</span>
            </a>
        </li>
    </ul>

    @include('comments.comments_block', ['essence' => $new])

@endsection