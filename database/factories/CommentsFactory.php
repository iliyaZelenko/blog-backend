<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$faker = \Faker\Factory::create('en_US'); // Faker::create('ru_RU');

$factory->define(App\Models\Comment::class, function () use ($faker) {
    return [
        'content' => $faker->paragraph,
        'post_id' => function () {
            return \App\Models\Post::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return \App\Models\User::inRandomOrder()->first()->id;
        },
        // TODO random from post comments
//        'comment_id' => function () {
//            return random_int(0, 1) ?
//                \App\Models\Comment::inRandomOrder()->first()->id
//                : null;
//        }
    ];
});
