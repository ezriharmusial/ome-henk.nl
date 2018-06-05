<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Page::class, function (Faker $faker) {
    $title = substr($faker->sentence(2), 0, -1);
    return [
            'user_id' => 1,
            'slug' => $title,
            'title_icon' => "fas fa-user-circle",
            'title' => $title,
            'subtitle' => substr($faker->sentence(6), 0, -1),
            'content' => $faker->paragraph,
            'has_articles' => $faker->boolean,
            'published' => $faker->boolean
    ];
});
