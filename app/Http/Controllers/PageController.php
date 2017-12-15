<?php

namespace App\Http\Controllers;

use App\Blog;
use App\News;
use Illuminate\Http\Request;
use App\Page;
use App\LeftMenu;

class PageController extends Controller
{
    public function index(){
        $data['page'] = Page::first();
        $data['blogs'] = Blog::limit(4)->orderBy('created_at','desc')->get();
        $data['news'] = News::limit(4)->orderBy('created_at','desc')->get();
        return view('main', $data);
    }

    public function page(Request $request){
        $data['page'] = Page::where('url', $request->url)->first();
        return view('page', $data);

    }
}
