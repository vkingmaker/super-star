<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [

        'title' => $faker->sentence,

        'url' => $faker->url,

        'thumb_nail' => $faker->sentence,

        'watched' => 0,

        'likes' => 0,
    ];
});
