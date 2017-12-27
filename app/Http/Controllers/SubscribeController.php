<?php

namespace App\Http\Controllers;

use App\Subcribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function create(Request $request){
        $sub = new Subcribe();
        $sub->name = $request->input('name');
        $sub->email = $request->input('email');
        $sub->save();
        return redirect('/');

    }
}
