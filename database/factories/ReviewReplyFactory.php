<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ReviewReply;
use Faker\Generator as Faker;

$factory->define(ReviewReply::class, function (Faker $faker) {
    return [
        'reply' => $faker->sentence,
    ];
});
