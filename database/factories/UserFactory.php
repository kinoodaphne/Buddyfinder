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
        'buddy' => $faker->randomElement(['Buddy', 'Searcher']),
        'bio' => $faker->realText(180),
        'profile_picture' => $faker->randomElement(['BG_1.jpg', 'BG_2.jpg', 'BG_3.jpg', 'BG_4.jpg', 'BG_5.jpg', 'BG_6.jpg', 'BG_7.jpg', 'BG_8.jpg']),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
