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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Skill::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->jobTitle
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->jobTitle,
        'date' => $faker->date,
        'description' => $faker->realText(150, 1),
        'image_url' => $faker->imageUrl(800, 600, 'cats')
    ];
});

$factory->define(App\Link::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->jobTitle,
        'url' => $faker->url,
        'image_url' => $faker->imageUrl(120, 120, 'cats')
    ];
});

$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'message' => $faker->realText(150, 1)
    ];
});

$factory->define(App\Profile::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->jobTitle,
        'bio' => $faker->realText(150, 1)
    ];
});
