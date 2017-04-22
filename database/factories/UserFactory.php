<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    $email = $faker->safeEmail;
    //get user name from email
    $user_name = strtok($email, '@');

    return [
        'user_name' => $user_name,
        'user_email' => $email,
        'user_pword' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
