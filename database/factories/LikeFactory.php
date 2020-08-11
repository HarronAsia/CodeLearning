<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Like;
$factory->define(Like::class, function (Faker $faker){
    $number = 1;
    return [
        "likeable_type" => "App\Models\Post",
        "likeable_id"=>rand(1,10),
        "user_id" =>$number++
    ];

});
