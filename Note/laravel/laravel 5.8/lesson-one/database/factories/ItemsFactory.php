<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Items;
use Faker\Generator as Faker;

$factory->define(Items::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "price" => $faker->numberBetween(1000,1000),
        "stock" => $faker->numberBetween(2,10)
    ];
});
