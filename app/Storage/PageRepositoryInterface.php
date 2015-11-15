<?php

namespace App\Storage;

interface PageRepositoryInterface extends RepositoryInterface
{
    public function findBySlug($slug);
}
?>