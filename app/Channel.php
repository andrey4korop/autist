<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function slug(){
        $this->slug = \Slug::make($this->name);
        return true;
    }
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
