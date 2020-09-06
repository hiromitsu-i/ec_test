<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        //
        'item_name' => $faker->name,
        'item_url' => $faker->imageUrl(),
        'item_description' => $faker->word,
        'item_price' => $faker->numberBetween($min=100,$max=5000),
        'item_tag' => null,
    ];
});
