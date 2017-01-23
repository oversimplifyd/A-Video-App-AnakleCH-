<?php

/*
|--------------------------------------------------------------------------
| User Factory
|--------------------------------------------------------------------------
|
| This creates  a user factory for seeding the database.
|
*/

$factory->define(Acada\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->email,
        'oauth_id' => $faker->text(20),
        'username' => $faker->safeEmail
    ];
});