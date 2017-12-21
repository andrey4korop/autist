<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Reply;
use App\Thread;
use Falur\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    protected $breadcrumbs;

    public function __construct()
    {
        $this->breadcrumbs = new Breadcrumbs();
        $this->breadcrumbs->add('Главная', '/');
        $this->breadcrumbs->add('forum', route('forum'));
    }
    public function index(){

        $data['title'] = 'forum';
        $data['breadcrumbs'] = $this->breadcrumbs;
        $data['channels'] = Channel::with('threads')->get();
        return view('forum.index', $data);
    }
    public function channel(Channel $channel){
        $this->breadcrumbs->add('forum', route('channel', ['channel' => $channel->slug]));
        $data['title'] = 'forum';
        $data['breadcrumbs'] = $this->breadcrumbs;
        $data['channel'] = $channel;
        return view('forum.channel', $data);
    }
    public function threadscreate(Channel $channel){
        $this->breadcrumbs->add($channel->name, route('channel', ['channel' => $channel->slug]));
        $data['title'] = 'forum';
        $data['breadcrumbs'] = $this->breadcrumbs;
        $data['channel'] = $channel;
        return view('forum.createthread', $data);
    }
    public function threadssave(Channel $channel, Request $request){

        $thread = new Thread();
        $thread->body=$request->input('body');
        $thread->user_id=$request->input('user_id');
        $thread->title=$request->input('title');
        $channel->threads()->save($thread);


        return $this->channel($channel);
    }
    public function replies(Channel $channel, Thread $thread){
        $this->breadcrumbs->add($channel->name, route('channel', ['channel' => $channel->slug]));
        $this->breadcrumbs->add($thread->title, route('replies', ['channel' => $channel->slug, 'thread' => $thread->id]));

        $data['title'] = 'forum';
        $data['breadcrumbs'] = $this->breadcrumbs;

        $data['threads'] = $thread;
        $data['replies'] = $thread->replies()->paginate(5);
        return view('forum.thread', $data);
    }
    public function repliesCreate(Channel $channel, Thread $thread, Request $request){

        $reply = new Reply();
        $reply->body=$request->input('body');
        $reply->user_id=$request->input('user_id');
        $thread->replies()->save($reply);


        return back();
    }

}
