<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Reply;
use App\Thread;
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
    public function replies(Channel $channel, Thread $thread){

        $data['title'] = 'forum';

        $data['threads'] = $thread;
        return view('test', $data);
    }
    public function repliesCreate(Channel $channel, Thread $thread, Request $request){

        $reply = new Reply();
        $reply->body=$request->input('body');
        $reply->user_id=$request->input('user_id');
        $thread->replies()->save($reply);


        return $this->replies( $channel, $thread);
    }

}
