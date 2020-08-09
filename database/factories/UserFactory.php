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
        // 'profile_picture' => $faker->randomElement(['https://images.unsplash.com/photo-1544502062-f82887f03d1c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1427&q=80', 'https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80', 'https://images.unsplash.com/photo-1527001192729-dd68b36cd890?ixlib=rb-1.2.1&auto=format&fit=crop&w=762&q=80',]),
        'profile_picture' => $faker->randomElement(['/images/profiles/BG_1.jpg', '/images/profiles/BG_2.jpg', '/images/profiles/BG_3.jpg', '/images/profiles/BG_4.jpg', '/images/profiles/BG_5.jpg', '/images/profiles/BG_6.jpg', '/images/profiles/BG_7.jpg', '/images/profiles/BG_8.jpg']),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
