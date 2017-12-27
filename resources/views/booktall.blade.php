@extends('layouts.lay')

@section('content')

    <div class="block books_block">
        <h1>ПОСІБНИКИ</h1>
        <p>для завантаження натисніть на одну з наступних категорій</p>
        <div class="block">
            @foreach($contents as $content)
                <div class="col-6">
                    <a href="{{route($RouteName,['url' => $content->url])}}" class="title">
                        <img src="https://autism.ua/wp-content/uploads/otwbm/tmb/animirovannaya-zhizn-life-animated-2016-smotret-onlayn_1510149720_460X250_c_c_1_FFFFFF.jpg" alt="">
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection