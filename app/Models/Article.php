<?php

namespace App\Models;

use App\Models\BaseModel;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Article extends BaseModel implements SluggableInterface
{
    use SluggableTrait;
    
    protected $table = 'articles';

    protected $fillable = [
        'title', 'excerpt', 'content', 'author_id', 'page_title', 'meta_keyword', 
        'meta_description', 'published', 'image'
    ];

    public static function findBySlug($slug)
    {
        return static::whereSlug($slug)->firstOrFail();
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function scopePublished($query)
    {
        return $query->wherePublished(true);
    }
}
