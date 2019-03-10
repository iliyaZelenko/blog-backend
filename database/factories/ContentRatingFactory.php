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

$faker = \Faker\Factory::create('en_US');

$factory->define(\App\Models\ContentRating::class, function () use ($faker) {
    $ratingableModels = [
        \App\Models\Post::class,
        \App\Models\Comment::class
    ];
    $ratingableModelClassKey = array_rand($ratingableModels);
    $ratingableModelClass = $ratingableModels[$ratingableModelClassKey];
    $ratingableModel = call_user_func($ratingableModelClass . '::inRandomOrder')->first();
    /** @var \App\Models\User $category */
    $user = \App\Models\User::inRandomOrder()->first();

    return [
        'value' => random_int(0, 1) === 1 ? 1: - 1,
        'content_type' => $ratingableModelClass,
        'content_id' => $ratingableModel->id,
        'user_id' => $user->id
    ];
});

$factory->afterCreating(\App\Models\ContentRating::class, function (\App\Models\ContentRating $contentRating, $faker) {
    $content = $contentRating->content;
    $val = abs($contentRating->value);

    if ($contentRating->value > 0) {
        $content->addRating($val);
    } else {
        $content->subtractRating($val);
    }
});
