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

$factory->define(App\Actor::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
    ];
});

$factory->define(App\Director::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
    ];
});

$factory->define(App\Movie::class, function (Faker\Generator $faker) {
    return [
        'name'            => $faker->catchPhrase,
        'year_of_release' => $faker->year,
    ];
});
