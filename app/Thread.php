<?php

namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function replies()
    {
        return $this->hasMany('App\Reply', 'thread_id', 'id');
    }
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
