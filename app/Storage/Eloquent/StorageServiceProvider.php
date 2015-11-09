<?php

namespace App\Storage\Eloquent;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Storage\UserRepositoryInterface',
            'App\Storage\Eloquent\UserRepository'
        );
        $this->app->bind(
            'App\Storage\CategoryRepositoryInterface',
            'App\Storage\Eloquent\CategoryRepository'
        );
    }
}
?>