<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    public function index(){
        $data['title'] = 'forum';
        $data['channels'] = Channel::all();
        $data['channels2'] = Channel::with('threads')->get();
        return view('test', $data);
    }
    public function channel(Channel $channel){

        $data['title'] = 'forum';

        $data['channels3'] = $channel;
        return view('test', $data);
    }


}
