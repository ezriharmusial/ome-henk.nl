<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Comment::class, function (Faker $faker) {
    $models = ['App\Post'];
    $user_id = 1;
    return [
            'user_id' => $user_id,
            'commentable_id' => rand(1,10),
            'commentable_type' => 0,
            'content' => $faker->comment,
    ];
});
