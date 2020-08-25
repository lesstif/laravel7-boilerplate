<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Project::class, function (Faker $faker) {

    $max_pc_id = \App\Models\ProjectCategory::max('id');
    $min_pc_id = \App\Models\ProjectCategory::min('id');

    $project_category_id = mt_rand($min_pc_id, $max_pc_id);

    return [
        'project_category_id' => $project_category_id,
        'name' => $faker->realText(20),
        'desc' => $faker->realText,
        'url' => $faker->url,
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
