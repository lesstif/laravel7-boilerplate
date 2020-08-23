<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    $email_verified_at = null;
    $remember_token = null;

    $service_started_at = '-10 years';

    $created_at = $faker->dateTimeBetween($service_started_at, 'now');

    // 10번 중 한 번은 email 검증 안 함 상태로 설정
    if (mt_rand(1, 10) !== 7) {
        $email_verified_at = $faker->dateTimeBetween($service_started_at, 'now');
        $remember_token = Str::random(10);
    }

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => $email_verified_at,
        'password' => bcrypt('secret'),
        'remember_token' => $remember_token,
        'created_at' => $created_at,
    ];
});
