<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index(){
        $data['blog'] = Blog::first();
        return view('page', $data);
    }

    public function blog(Request $request){
        $data['blog'] = Blog::where('url', '=', $request->url)->first();
        $data['title'] = $data['blog']->title;
        return view('blog', $data);
    }
}
