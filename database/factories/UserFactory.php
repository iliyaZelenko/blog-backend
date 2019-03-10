<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    $addName = mt_rand(1, 2) === 2;
    $gender = random_int(1, 4) < 4; // true - мужчина, 25% что женщина

    return [
//        'name' => $faker->name // или ->name($gender),
        'first_name' => $addName ? $faker->firstName($gender) : null,
        'last_name' => $addName ? $faker->lastName($gender) : null,
        'nickname' => str_replace('.', '_', $faker->userName),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'gender' => $gender,
        'birthday' => random_int(1, 3) === 1 ?
            Carbon::now()
                ->subYears(random_int(22, 40))
                ->subDays(random_int(1, 800))
            : null,
        'created_at' => Carbon::now()->subDays(random_int(1, 800))
    ];
});
