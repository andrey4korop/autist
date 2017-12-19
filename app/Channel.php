<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function slug(){
        $this->slug = \Slug::make($this->title);
        return true;
    }
}
