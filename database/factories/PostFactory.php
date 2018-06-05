<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Post::class, function (Faker $faker) {
    $title = substr($faker->sentence(5), 0, -1);
    $randomPost = App\Page::where('has_articles', 1)->orderByRaw('RAND()')->first();;
    return [
            'user_id' => 1,
            'page_id' => $randomPost,
            'slug' => $title,
            'title' => $title,
            'subtitle' => substr($faker->sentence(6), 0, -1),
            'content' => $faker->paragraph,
            'published' => $faker->boolean
    ];
});
