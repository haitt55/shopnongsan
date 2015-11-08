<?php

Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'auth.getLogin']);
Route::post('auth/login', ['uses' => 'Auth\AuthController@postLogin', 'as' => 'auth.postLogin']);
Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'auth.getLogout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home.index']);
    Route::get('dashboard', ['uses' => 'HomeController@index', 'as' => 'home.dashboard']);

    Route::get('profile/edit', ['uses' => 'ProfileController@edit', 'as' => 'profile.edit']);
    Route::put('profile/update', ['uses' => 'ProfileController@update', 'as' => 'profile.update']);
    Route::get('profile/editPassword', ['uses' => 'ProfileController@editPassword', 'as' => 'profile.editPassword']);
    Route::put('profile/updatePassword', ['uses' => 'ProfileController@updatePassword', 'as' => 'profile.updatePassword']);

    Route::resource('users', 'UsersController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('pages', 'PagesController');
    Route::resource('articles', 'ArticlesController');
    Route::resource('contacts', 'ContactsController', ['only' => ['index', 'show', 'destroy']]);

    Route::get('settings/general', ['uses' => 'SettingsController@general', 'as' => 'settings.general']);
    Route::put('settings/general', ['uses' => 'SettingsController@updateGeneral', 'as' => 'settings.updateGeneral']);
});