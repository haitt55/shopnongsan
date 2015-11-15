<?php

namespace App\Storage\Eloquent;

use App\Storage\ArticleRepositoryInterface;

class ArticleRepository extends Repository implements ArticleRepositoryInterface
{
    public function findBySlug($slug)
    {
        return $this->model->bySlug($slug)->firstOrFail();
    }
}
?>