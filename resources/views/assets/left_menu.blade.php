<li class={{$menu->children->isEmpty()?'toggle':'rootMenu'}}><a href="/page/{{$menu->page->url}}" class="{{Route::current()->url==$menu->page->url?'current':''}}">{{$menu->page->title}}</a>
    {!!  !$menu->children->isEmpty()?'<span class=btnToggle>+</span>':''!!}
</li>
@if(!$menu->children->isEmpty())
    @each('assets.left_menu', $menu->children, 'menu')
@endif