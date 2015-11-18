<?php

namespace App\Storage\Eloquent;

use App\Storage\ArticleRepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticleRepository extends Repository implements ArticleRepositoryInterface
{
    public function findBySlug($slug)
    {
        return $this->model->findBySlug($slug);
    }

    public function getPublishedArticles()
    {
        return $this->model->published()->orderBy('created_at', 'desc');
    }
}
?>