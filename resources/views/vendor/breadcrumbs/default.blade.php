<ul id="breadcrumb">
    @foreach ($crumbs as $crumb)
    <li>
        @if ($crumb->url)
        <a href="{{ $crumb->url }}">
            {{ $crumb->title }}
        </a>
        @else
        <span>
            {{ $crumb->title }}
        </span>
        @endif
    </li>
        @if(!$loop->last)
        <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
    @endif
    @endforeach
</ul>