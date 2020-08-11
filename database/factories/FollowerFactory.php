<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use  App\Models\Follower;
$factory->define(Follower::class, function (Faker $faker) {
    static $number = 1;
    return [
        "follower_id" => $number++,
        "following_id" => rand(1,10),
    ];
});


