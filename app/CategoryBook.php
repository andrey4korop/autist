<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryBook extends Model
{
    public function slug(){
        $this->url = \Slug::make($this->title);
        return true;
    }
    public function books()
    {
        return $this->hasMany(Book::class, 'category_id')->orderBy('created_at', 'desc');
    }
}
