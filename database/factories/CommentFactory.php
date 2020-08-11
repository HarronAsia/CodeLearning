<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Comment;
$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment_detail' => $faker->sentence(),
        'commentable_type' => 'App\Models\Post',
        'commentable_id' => rand(1,10),
        'user_id' => rand(1,10),
    ];
});
