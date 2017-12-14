<li><a href="/page/{{$menu->page->url}}" class="{{Route::current()->url==$menu->page->url?'current':''}}">{{$menu->page->title}}</a></li>

@if(!empty($menu->children))
    @each('assets.left_menu', $menu->children, 'menu')
@endif