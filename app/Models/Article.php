<?php

namespace App\Models;

use App\Models\BaseModel;

class Article extends BaseModel
{
    protected $table = 'articles';

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }
}
