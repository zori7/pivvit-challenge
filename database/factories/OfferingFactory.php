<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Offering;
use Faker\Generator as Faker;

$factory->define(Offering::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'price' => $faker->numberBetween(100, 10000)
    ];
});
