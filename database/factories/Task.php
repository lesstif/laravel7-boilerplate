<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TaskStatus;
use App\User;
use Faker\Generator as Faker;

$factory->define(\App\Models\Task::class, function (Faker $faker) {
    $max_prj_id = \App\Models\Project::max('id');
    $min_prj_id = \App\Models\Project::min('id');

    $project_id = mt_rand($min_prj_id, $max_prj_id);

    $due_date = $faker->dateTimeBetween('-3 months', '+2 months');

    return [
        'project_id' => $project_id,
        'assignee_id' => mt_rand(User::min('id'), User::max('id')),
        'status_id' => mt_rand(TaskStatus::min('id'), TaskStatus::max('id')),
        'name' => $faker->realText(20),
        'desc' => $faker->realText,
        'due_date' => $due_date,
        'is_reminder' => $faker->boolean,
        'reminder_at' => (\Carbon\Carbon::instance($due_date))->subDays(7),
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
        'completed_at' => $faker->dateTimeBetween('now', '2 months'),
    ];
});
