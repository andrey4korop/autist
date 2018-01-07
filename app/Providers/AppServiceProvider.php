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
use App\Profile;
use App\Reply;
use App\ThisInt;
use App\Thread;
use App\TopMenu;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Blog;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*DB::listen(function($query) {
            dump($query->sql, $query->bindings, $query->time);
        });*/
        User::created(function ($user) {
            $user->profile()->save(new Profile());
            return true;
        });
        Blog::saving(function ($blog) {
            $blog->author()->associate(Auth::user());
            return $blog->slug();
        });
        News::saving(function ($new) {
            $new->author()->associate(Auth::user());
            return $new->slug();
        });
        Channel::saving(function ($channel) {
            return $channel->slug();
        });
        Media::saving(function ($media) {
            $media->author()->associate(Auth::user());
            $media->youtube_id = Youtube::parseVidFromURL($media->youtube_url);
            $media->youtube_img = Youtube::getVideoInfo($media->youtube_id)->snippet->thumbnails->maxres->url;
            return $media->slug();
        });
        Page::saving(function ($page) {
            $page->author()->associate(Auth::user());
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
            $page->author()->associate(Auth::user());
            return $page->slug();
        });
        DocumentSubCategory::saving(function ($page) {
            $page->document_type_id = 1;
            return $page->slug();
        });
        Thread::saving(function ($page) {
            $page->author()->associate(Auth::user());
            return true;
        });
        Reply::saving(function ($page) {
            $page->author()->associate(Auth::user());
            return true;
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
