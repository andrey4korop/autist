<?php

namespace App\Http\Controllers;

use App\CategoryBook;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $data['contents'] = CategoryBook::all();
        $data['title'] = 'Книги';
        $data['RouteName'] = 'books';
        return view('booktall', $data);
    }

    public function books(Request $request){
        $data['content'] = CategoryBook::where('url', '=', $request->url)->first();
        $data['title'] = $data['content']->title;
        return view('books', $data);
    }
}
