<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    public function index(){
        $News = News::first();
        return view('page', $News);
    }

    public function news(Request $request){
        $New = News::where('url', '=', $request->url)->first();
        return view('page', $New);
        //Page::where('url', $request->url);
    }
}
