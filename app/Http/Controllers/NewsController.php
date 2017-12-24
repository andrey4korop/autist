<?php

namespace App\Http\Controllers;


use App\Comment;
use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    public function index(){
        $data['contents'] = News::orderBy('created_at', 'desc')->paginate(10);
        $data['title'] = 'Новини';
        $data['RouteName'] = 'new';
        return view('contentall', $data);
    }

    public function new(Request $request){
        $data['content'] = News::where('url', '=', $request->url)->first();
        $data['title'] = $data['content']->title;


        return view('content', $data);
    }
}
