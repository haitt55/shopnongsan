<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Page::class, function (Faker\Generator $faker) {
    $title = $faker->sentence;
    $slug = str_slug($title);

    return [
        'title' => $title,
        'slug' => $slug,
        'content' => $faker->paragraph(),
        'page_title' => $faker->sentence(),
        'meta_keyword' => implode(',', $faker->words()),
        'meta_description' => $faker->text(),
        'published' => $faker->boolean(),
    ];
});

$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
    $title = $faker->sentence;
    $slug = str_slug($title);

    return [
        'title' => $title,
        'slug' => $slug,
        'excerpt' => $faker->paragraph(),
        'content' => $faker->paragraph(),
        'author_id' => $faker->randomElement(App\Models\User::lists('id')->toArray()),
        'page_title' => $faker->sentence(),
        'meta_keyword' => implode(',', $faker->words()),
        'meta_description' => $faker->text(),
        'published' => $faker->boolean(),
    ];
});

$factory->define(App\Models\Message::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
        'content' => $faker->paragraph(),
        'unread' => $faker->boolean(),
    ];
});