<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThisInt extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function slug(){
        $this->url = \Slug::make($this->title);
        return true;
    }
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

}
