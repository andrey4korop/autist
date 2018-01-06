<div class="ads">
    @foreach($ads as $ad)
        <div class="ads_content">
            <a href="{{route('ads', $ad)}}">
                <img src="{{$ad->img_path}}" alt="">
            </a>
        </div>
    @endforeach
</div>