<?php

namespace App\Models;

use App\Models\BaseModel;

class Page extends BaseModel
{
    protected $table = 'pages';
    
    protected $fillable = [
        'title', 'content', 'page_title', 'meta_keyword', 'meta_description',
        'handle', 'published'
    ];
}
