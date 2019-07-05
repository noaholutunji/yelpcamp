<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Campground;
use Faker\Generator as Faker;

$factory->define(Campground::class, function (Faker $faker) {
    return [
        'name' => $this->faker->sentence,
        'image' => $this->faker->imageUrl,
        'description' => $this->faker->sentence,
        'owner_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
