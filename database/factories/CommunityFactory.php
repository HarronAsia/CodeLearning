<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Community;
$factory->define(Community::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
    ];
});
