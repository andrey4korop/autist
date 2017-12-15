<?php

namespace App\Http\Controllers;

use App\ThisInt;
use Illuminate\Http\Request;

class ThisIntController extends Controller
{
    public function index(){
        $News = ThisInt::first();
        return view('page', $News);
    }

    public function vazlivo(Request $request){
        $data['thisInt'] = ThisInt::where('url', '=', $request->url)->first();
        $data['title'] = $data['thisInt']->title;
        return view('thisInt', $data);
    }
}
