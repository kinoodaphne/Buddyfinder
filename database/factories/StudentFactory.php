<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Student::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'year' => $faker->numberBetween(1,3),
        'study_field' => $faker->text,
        'music' => $faker->text,
        'hobbies' => $faker->text,
        'series' => $faker->text,
        'gaming' => $faker->text,
        'books' =>$faker->text,
        'travel' => $faker->text,
        'buddy' => $faker->text,
        'bio' => $faker->realText(200),
    ];
});
