<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Post;
$factory->define(Post::class, function (Faker $faker) {
    return [
        "title" => $faker->title,
        "detail" => $faker->sentence,
        "status" => 'Public',
        "community_id" => rand(1,10),
        "user_id" => rand(1,1000),
    ];
});
