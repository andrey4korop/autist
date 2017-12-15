<?php

namespace App\Providers;

use App\News;
use App\Page;
use App\ThisInt;
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
        News::saving(function ($new) {
            return $new->slug();
        });
        Page::saving(function ($page) {
            return $page->slug();
        });
        ThisInt::saving(function ($page) {
            return $page->slug();
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
