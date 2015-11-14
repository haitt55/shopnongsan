<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.*', 'App\Http\ViewComposers\Admin\GlobalComposer');
        view()->composer('admin.home.dashboard', 'App\Http\ViewComposers\Admin\HomeComposer');
        view()->composer(['admin.articles.create', 'admin.articles.edit'], 'App\Http\ViewComposers\Admin\ArticlesComposer');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}