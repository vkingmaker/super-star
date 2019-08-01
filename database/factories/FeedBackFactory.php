<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ViewersFeedback;
use Faker\Generator as Faker;

$factory->define(ViewersFeedback::class, function (Faker $faker) {
    return [

        'video_id' => factory('App\Video')->create(),

        'user_id' => factory('App\User')->create(),

        'comment' =>  $faker->paragraph,
    ];
});
