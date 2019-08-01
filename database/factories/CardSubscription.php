<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CardSubscription;
use Faker\Generator as Faker;

$factory->define(CardSubscription::class, function (Faker $faker) {
    return [

        'userId' => factory('App\User')->create(),

        'cardNumber' => (int) $this->faker->creditCardNumber,

        'postcode' => (int) $this->faker->postcode,

        'year' => (int) $this->faker->year($max = 'now'),

        'month' => (int) $this->faker->month($max = 'now'),

        'cvv' =>  234,

    ];
});
