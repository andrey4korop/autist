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
}
