<?php

use Faker\Generator as Faker;

$factory->define(App\Models\WifiNetwork::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'key'         => $faker->randomKey(),
        'description' => $faker->text,
        'created_at'  => $faker->dateTimeThisMonth,
        'updated_at'  => $faker->dateTimeThisMonth,
    ];
});
