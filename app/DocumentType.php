<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    public function documents()
    {
        return $this->hasMany(Document::class, 'category_type_id');
    }
    public function subCategory()
    {
        return $this->hasMany(DocumentSubCategory::class, 'document_type_id');
    }
    public function getRouteKeyName()
    {
        return 'url';
    }
}
