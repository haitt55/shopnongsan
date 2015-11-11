<?php

namespace App\Storage\Eloquent;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Storage\UserRepositoryInterface', function() {
            return new \App\Storage\Eloquent\UserRepository(new \App\Models\User);
        });
        $this->app->bind('App\Storage\PageRepositoryInterface', function() {
            return new \App\Storage\Eloquent\PageRepository(new \App\Models\Page);
        });
        $this->app->bind('App\Storage\ArticleRepositoryInterface', function() {
            return new \App\Storage\Eloquent\ArticleRepository(new \App\Models\Article);
        });
    }
}
?>