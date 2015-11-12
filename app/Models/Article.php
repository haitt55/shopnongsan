<?php

namespace App\Models;

use App\Models\BaseModel;

class Article extends BaseModel
{
    protected $table = 'articles';

    protected $fillable = [
        'title', 'excerpt', 'content', 'author_id', 'page_title', 'meta_keyword', 
        'meta_description', 'published'
    ];

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }
}
