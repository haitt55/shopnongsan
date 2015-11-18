<?php

// Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'admin.auth.getLogin']);
    Route::post('auth/login', ['uses' => 'Auth\AuthController@postLogin', 'as' => 'admin.auth.postLogin']);
    Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'admin.auth.getLogout']);

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/', ['uses' => 'HomeController@index', 'as' => 'admin.home.index']);
        Route::get('dashboard', ['uses' => 'HomeController@dashboard', 'as' => 'admin.home.dashboard']);

        Route::get('profile/edit', ['uses' => 'ProfileController@edit', 'as' => 'admin.profile.edit']);
        Route::put('profile/update', ['uses' => 'ProfileController@update', 'as' => 'admin.profile.update']);
        Route::get('profile/editPassword', ['uses' => 'ProfileController@editPassword', 'as' => 'admin.profile.editPassword']);
        Route::put('profile/updatePassword', ['uses' => 'ProfileController@updatePassword', 'as' => 'admin.profile.updatePassword']);

        Route::resource('users', 'UsersController');
        Route::resource('pages', 'PagesController');
        Route::resource('articles', 'ArticlesController');
        Route::post('articles/addPhoto', ['uses' => 'ArticlesController@addPhoto', 'as' => 'admin.articles.addPhoto']);
        Route::resource('messages', 'MessagesController', ['only' => ['index', 'show', 'destroy']]);

        Route::get('appSettings/general', ['uses' => 'AppSettingsController@general', 'as' => 'admin.appSettings.general']);
        Route::put('appSettings/general', ['uses' => 'AppSettingsController@updateGeneral', 'as' => 'admin.appSettings.updateGeneral']);
    });
});

// Web
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home.index']);
Route::get('articles.html', ['uses' => 'ArticlesController@index', 'as' => 'articles.index']);
Route::get('articles/{slug}.html', ['uses' => 'ArticlesController@show', 'as' => 'articles.show']);
Route::get('{slug}.html', ['uses' => 'PagesController@show', 'as' => 'pages.show']);
Route::post('messages', ['uses' => 'MessagesController@store', 'as' => 'messages.store']);