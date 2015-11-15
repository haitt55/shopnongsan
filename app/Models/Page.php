<?php

namespace App\Models;

use App\Models\BaseModel;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Page extends BaseModel
{
    use SluggableTrait;
    
    protected $table = 'pages';

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];
    
    protected $fillable = [
        'title', 'content', 'page_title', 'meta_keyword', 'meta_description',
        'handle', 'published'
    ];
}
