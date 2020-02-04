<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Modules\Advertisement\Entities\Banner;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(100),
        'banner' => $faker->imageUrl('650', '650', 'transport'),
        'link' => $faker->url,
        'status' => Banner::STATUS_ARRAY[array_rand(Banner::STATUS_ARRAY)],
        'starts_at' => $faker->dateTimeBetween('now', '+5 days'),
        'ends_at' => $faker->dateTimeBetween('+5 days', '+30 days'),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
