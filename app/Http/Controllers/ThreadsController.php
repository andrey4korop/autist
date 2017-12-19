<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    public function index(){
        $data['title'] = 'forum';
        $data['channels'] = Channel::all();
        return view('test', $data);
    }
}
