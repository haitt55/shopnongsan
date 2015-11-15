<?php

namespace App\Storage;

interface ArticleRepositoryInterface extends RepositoryInterface
{
    public function findBySlug($slug);
}
?>