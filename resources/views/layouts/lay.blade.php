<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700|Roboto+Condensed:300,400,700|Roboto:300,400,700&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="/css/a.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


    <!--<link rel="stylesheet" type="text/css" media="all" href="{{asset('css')}}/app.css" >-->
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('comments/css')}}/comments.css" >


    <script type="text/javascript" src="{{asset('js')}}/app.js" ></script>
    <script type="text/javascript" src="{{asset('comments/js')}}/comment-reply.js"></script>
    <script type="text/javascript" src="{{asset('comments/js')}}/comment-scripts.js"></script>
    <script src="/js/tinymce/tinymce.min.js"></script>


</head>
<body>
<div class="left">
    <div class="logo">
        <a href="/"><img src="/img/logo.png" alt=""></a>
    </div>
    <nav>
        <ul>
            @each('assets.left_menu', App\LeftMenu::with('page')->orderBy('_lft')->get()->toTree(), 'menu')
            <!--<li><a href="" class="current">Головна</a></li>
            <li><a href="">Аутизм</a></li>
            <li><a href="">Виявлення</a></li>
            <li><a href="">Діагностування</a></li>
            <li><a href="">Терапія</a></li>
            <li><a href="">Навчання та Інклюзія</a></li>
            <li><a href="">Центри</a></li>
            <li><a href="">Життя в Родині</a></li>
            <li><a href="">Життя в Суспільстві</a></li>
            <li><a href="">Працюючий Аутист</a></li>
            <li><a href="">Аутизм в Україні</a></li>
            <li><a href="">Аутизм в Світі</a></li>
            <li><a href="">Анонси</a></li>
            <li><a href="">FAQ</a></li>
            <li><a href="">Співпраця</a></li>
            <li><a href="">Благодійність</a></li>
            <li><a href="">Юридична консультація</a></li>-->
        </ul>
    </nav>
    <div class="search">
        <form action="">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="text" placeholder="Введіть умови пошуку">
        </form>

    </div>
    <div class="social">
        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-rss" aria-hidden="true"></i></a>
    </div>
</div>
<div class="right">
    <div {{Route::current()->url==''?'id=mainPage':''}} class="content-all">
        @yield('content')
    </div>
    <div class="block footer">
        <div class="footer_left">
            <p>© 2017 Autism.ua | Всі права захищені</p>
            <nav class="bottom">
                <a href="#">Про Нас</a><p>|</p>
                <a href="#">Медiа</a><p>|</p>
                <a href="#">Зi ЗМI</a><p>|</p>
                <a href="#">Правила форуму</a><p>|</p>
                <a href="#">FAQ</a><p>|</p>
                <a href="#">Контакти</a><p>|</p>
                <a href="#">Інформація для рекламодавців</a>
            </nav>
        </div>
        <div class="footer_rigth">
            <div class="social">
                <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-rss" aria-hidden="true"></i></a>
            </div>
            <a href="#top" id="top">
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        tinymce.init({
            selector:'textarea',
            language: 'uk_UA',
            plugins: [
                "advlist autolink link image lists charmap hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons textcolor paste textcolor colorpicker textpattern"
            ],
            toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
            toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media  | insertdatetime | forecolor backcolor",
            toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | | ltr rtl | visualchars visualblocks nonbreaking pagebreak restoredraft | code",
        });
        $(".btnToggle").click(function () {
            $(this).parent().nextUntil('.rootMenu').slideToggle("slow");;

        });
    })
</script>
</body>
</html>