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
    return [
        'name' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'location' => $faker->state,
        'year' => $faker->randomElement(['1IMD', '2IMD', '3IMD',]),
        'study_field' => $faker->text,
        'music' => $faker->text,
        'hobbies' => $faker->text,
        'series' => $faker->text,
        'gaming' => $faker->text,
        'books' =>$faker->text,
        'travel' => $faker->text,
        'buddy' => $faker->randomElement(['buddy', 'searcher']),
        'bio' => $faker->realText(200),
        'profile_picture' => $faker->imageUrl($width = 640, $height = 480),
        // 'http://lorempixel.com/640/480/'
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
