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

    public function new(Request $request){
        $data['new'] = News::where('url', '=', $request->url)->first();
        return view('new', $data);
        //Page::where('url', $request->url);
    }
}
