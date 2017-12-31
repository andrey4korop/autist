<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    public function slug(){
        $this->url = \Slug::make($this->title);
        return true;
    }
    public function left_menu()
    {
        return $this->belongsTo('App\LeftMenu', 'id', 'page_id');
    }
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }
}
