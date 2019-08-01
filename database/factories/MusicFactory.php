<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Music;
use Faker\Generator as Faker;

$factory->define(Music::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,

        'url' => $faker->url,

        'albumart' => $faker->url,

        'likes' => 0,
    ];
});
