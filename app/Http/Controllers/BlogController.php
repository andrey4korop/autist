<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index(){
        $blog = Blog::first();
        return view('page', $blog);
    }

    public function blog(Request $request){
        $blog = Blog::where('url', '=', $request->url)->first();
        return view('page', $blog);
        //Page::where('url', $request->url);
    }
}
