<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reply extends Model
{
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
