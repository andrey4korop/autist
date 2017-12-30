<?php

namespace App\Providers;

use Alaouy\Youtube\Facades\Youtube;
use App\BottomMenu;
use App\Channel;
use App\DocumentSubCategory;
use App\LeftMenu;
use App\Media;
use App\News;
use App\Page;
use App\ThisInt;
use App\TopMenu;
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
        Channel::saving(function ($channel) {
            return $channel->slug();
        });
        Media::saving(function ($media) {
            $media->youtube_id = Youtube::parseVidFromURL($media->youtube_url);
            $media->youtube_img = Youtube::getVideoInfo($media->youtube_id)->snippet->thumbnails->maxres->url;
            return $media->slug();
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
        TopMenu::saving(function ($topMenu) {
            $topMenu->title = $topMenu->page->title;
            return $topMenu;
        });
        BottomMenu::saving(function ($bottomMenu) {
            $bottomMenu->title = $bottomMenu->page->title;
            return $bottomMenu;
        });
        ThisInt::saving(function ($page) {
            return $page->slug();
        });
        DocumentSubCategory::saving(function ($page) {
            $page->document_type_id = 1;
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
