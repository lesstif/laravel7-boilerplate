<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Task::class, function (Faker $faker) {
    $max_prj_id = \App\Models\Project::max('id');
    $min_prj_id = \App\Models\Project::min('id');

    $project_id = mt_rand($min_prj_id, $max_prj_id);

    $due_date = $faker->dateTimeBetween('-3 months', '+2 months');
    return [
        'project_id' => $project_id,
        'name' => $faker->realText(20),
        'desc' => $faker->realText,
        'due_date' => $due_date,
        'is_reminder' => $faker->boolean,
        'reminder_at' => (\Carbon\Carbon::instance($due_date))->subDays(7),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
