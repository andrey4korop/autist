<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentSubCategory extends Model
{
    public function slug(){
        $this->url = \Slug::make($this->title);
        return true;
    }
    public function documents()
    {
        return $this->hasMany(Document::class, 'sub_category_type_id');
    }
    public function getRouteKeyName()
    {
        return 'url';
    }
}
