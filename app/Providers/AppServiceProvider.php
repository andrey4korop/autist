<?php

namespace App\Providers;

use App\LeftMenu;
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
            if(!empty($page->left_menu)){
                $left = $page->left_menu;
                $left->title = $page->title;
                $left->save();
            }
            return $page->slug();
        });
        LeftMenu::saving(function ($leftMenu) {
            $leftMenu->title = $leftMenu->page->title;
            return $leftMenu;
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
