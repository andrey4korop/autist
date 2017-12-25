<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Channel;
use App\Media;
use App\News;
use App\ThisInt;
use Illuminate\Http\Request;
use App\Page;
use App\LeftMenu;

class PageController extends Controller
{
    public function index(){
        $data['page'] = Page::first();
        $data['title'] = $data['page']->title;
        $data['blogs'] = Blog::limit(6)->orderBy('created_at','desc')->get();
        $data['news'] = News::limit(4)->orderBy('created_at','desc')->get();
        $data['ThisInt'] = ThisInt::limit(1)->orderBy('created_at','desc')->first();
        $data['Channels'] = Channel::all();
        $data['Medias'] = Media::all();
        return view('main', $data);
    }

    public function page(Request $request){
        $data['page'] = Page::where('url', $request->url)->first();
        $data['title'] = $data['page']->title;
        return view('page', $data);

    }
}
