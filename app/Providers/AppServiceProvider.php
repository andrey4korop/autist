<?php

namespace App\Providers;

use App\News;
use App\Page;
use Illuminate\Support\ServiceProvider;
use App\Blog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blog::saving(function ($blog) {
            return $blog->slug();
        });
        News::saving(function ($blog) {
            return $blog->slug();
        });
        Page::saving(function ($blog) {
            return $blog->slug();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
