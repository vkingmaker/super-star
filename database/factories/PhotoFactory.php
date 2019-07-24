<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    return [

        'caption' => $faker->sentence,

        'url' => $faker->url,

        'likes' => 0
    ];
});
