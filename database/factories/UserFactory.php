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

        'study_field' => $faker->randomElement(['Design', 'Development', 'UX', 'UI']),

        'music' => $faker->randomElement(['Electro', 'Rock', 'Jazz', 'Dubstep', 'Blues', 'Techno', 'Country', 'Indie', 'Pop', 'Metal', 'Andere',]),

        'hobbies' => $faker->randomElement(['Actie', 'Avontuur', 'Komedie', 'First person', 'Horror', 'Party', 'Puzzle', 'Racing', 'Sport', 'Strategie', 'Shooter', 'Andere',]),

        'series' => $faker->randomElement(['Internationaal', 'Nationaal', 'Nieuws', 'Quiz', 'Sport', 'Andere',]),

        'gaming' => $faker->randomElement(['Actie', 'Avontuur', 'Komedie', 'First person', 'Horror', 'Party', 'Puzzle', 'Racing', 'Sport', 'Strategie', 'Shooter', 'Andere',]),

        'books' =>$faker->randomElement(['Actie', 'Avontuur', 'Komedie', 'Comics', 'Detective', 'Drama', 'Graphic novels', 'Horror', 'Romantiek', 'Thriller', 'Andere',]),

        'travel' => $faker->randomElement(['Noord-Amerika', 'Zuid-Amerika', 'Europa', 'Afrika', 'Azië', 'Australië', 'Antartica',]),

        'buddy' => $faker->randomElement(['Buddy', 'Searcher']),

        'bio' => $faker->realText(180),
        'profile_picture' => $faker->randomElement(['BG_1.jpg', 'BG_2.jpg', 'BG_3.jpg', 'BG_4.jpg', 'BG_5.jpg', 'BG_6.jpg', 'BG_7.jpg', 'BG_8.jpg']),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
