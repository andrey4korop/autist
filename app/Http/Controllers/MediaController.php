<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(){
        $data['contents'] = Media::orderBy('created_at', 'desc')->paginate(10);
        $data['title'] = 'Media';
        $data['RouteName'] = 'media';
        return view('contentOneColumn', $data);
    }

    public function media(Request $request){
        $data['content'] = Media::where('url', '=', $request->url)->first();
        $data['title'] = $data['content']->title;


        return view('contentMedia', $data);
    }
}
