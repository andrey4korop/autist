<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
class TopMenu extends Model
{
    use NodeTrait;
    public function page()
    {
        return $this->hasOne('App\Page', 'id', 'page_id');
    }
}
