<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\LeftMenu;

class PageController extends Controller
{
    public function index(){
        $page = Page::first();

        return view('page', $page);
    }

    public function page(Request $request){
        $page = Page::where('url', '=', $request->url)->first();
        return view('page', $page);
        //Page::where('url', $request->url);
    }
}
