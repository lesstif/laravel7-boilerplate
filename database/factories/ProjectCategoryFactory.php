<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\ProjectCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'desc' => $faker->realText,
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
