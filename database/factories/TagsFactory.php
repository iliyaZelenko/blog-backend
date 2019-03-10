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

$faker = \Faker\Factory::create('en_US'); // Faker::create('ru_RU');

$factory->define(App\Models\Tag::class, function () use ($faker) {
    $title = $faker->word;

    return [
        'name' => $title,
        'name_slug' => str_slug($title),
        'about' => $faker->paragraph,
        'category_id' => function () {
            return \App\Models\Category::inRandomOrder()->first()->id;
        }
    ];
});
