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
}
