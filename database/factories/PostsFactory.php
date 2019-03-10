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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Carbon\Carbon;

$faker = \Faker\Factory::create('en_US');// Faker::create('ru_RU');

$factory->define(\App\Models\Post::class, function () use ($faker) {
    $title = $faker->sentence;

    /** @var \App\Models\User $category */
    $user = \App\Models\User::inRandomOrder()->first();
    /** @var \App\Models\Category $category */
    $category = \App\Models\Category::inRandomOrder()->first();

    return [
        'title' => $title,
        'title_slug' => function (array $post) {
            return str_slug($post['title']);
        },
        'content_short' => $faker->realText,
        'content' => $faker->paragraph, // $faker->realText . $faker->realText,
        'user_id' => $user->id,
        'category_id' => $category->id
    ];
});

$factory->afterCreating(\App\Models\Post::class, function (\App\Models\Post $post, $faker) {
    // $post->category->savePost($post);

    $post->category->posts()->save($post);
});
