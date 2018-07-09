<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Activity::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
        'points'      => $faker->numberBetween(300, 50000),
        'created_at'  => $faker->dateTimeThisMonth,
        'updated_at'  => $faker->dateTimeThisMonth,
    ];
});
