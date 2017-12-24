@foreach(App\BottomMenu::with('page')->orderBy('_lft')->get() as $menu)
<a href="/page/{{$menu->page->url}}">{{$menu->title}}</a>
@if (!$loop->last)
    <p>|</p>
@endif
@endforeach