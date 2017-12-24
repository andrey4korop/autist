<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index(){
        $data['contents'] = Blog::orderBy('created_at', 'desc')->paginate(10);
        $data['title'] = 'Блог';
        $data['RouteName'] = 'blog';
        return view('contentall', $data);
    }

    public function blog(Request $request){
        $data['content'] = Blog::where('url', '=', $request->url)->first();
        $data['title'] = $data['content']->title;
        return view('content', $data);
    }
}
