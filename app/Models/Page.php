<?php

namespace App\Models;

use App\Models\BaseModel;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Page extends BaseModel implements SluggableInterface
{
    use SluggableTrait;
    
    protected $table = 'pages';
    
    protected $fillable = [
        'title', 'content', 'page_title', 'meta_keyword', 'meta_description', 'published'
    ];

    public function scopeBySlug($query, $slug)
    {
        return $query->whereSlug($slug);
    }
}
