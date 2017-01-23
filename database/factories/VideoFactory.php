<?php

/*
|--------------------------------------------------------------------------
| Video Factory
|--------------------------------------------------------------------------
|
| This creates  a Video factory for seeding the database.
|
*/

$factory->define(Acada\Video::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->realText(),
        'description' => $faker->text(),
        'category' => $faker->name,
        'url' => $faker->url,
        'user_id' => function () {
            return factory(Acada\User::class)->create()->id;
        }
    ];
});