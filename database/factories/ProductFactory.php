<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Product::class, function (Faker $faker) {

    $user_vendor = User::where('name','vendor')->first();
    return [
        'name' => $faker->word,
        'price' => $faker->randomNumber(2),
        'currency' => 'USD',
        'description' => $faker->text()
    ];
});
