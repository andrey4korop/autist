<?php

namespace App\Http\Controllers;

use App\ThisInt;
use Illuminate\Http\Request;

class ThisIntController extends Controller
{
    public function index(){
        $data['contents'] = ThisInt::orderBy('created_at', 'desc')->paginate(10);
        $data['title'] = 'Це важливо';
        $data['RouteName'] = 'vazlivo';
        return view('contentall', $data);
    }

    public function vazlivo(Request $request){
        $data['content'] = ThisInt::where('url', '=', $request->url)->first();
        $data['title'] = $data['content']->title;
        return view('content', $data);
    }
}
