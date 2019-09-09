<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Banner;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {
    $btn_text_arr = ['Sign up', 'Subscribe', 'Try for free', 'Get started', 'Learn more', 'Join us', 'Try Out', 'Start Now'];
    return [
        'title' => $faker->realText(100),
        'btn_show' => $faker->boolean,
        'btn_text' => $btn_text_arr[array_rand($btn_text_arr, 1)],
        'btn_link' => $faker->url,
        'banner_img_mobile' => $faker->imageUrl(Banner::MOBILE_WIDTH, Banner::MOBILE_HEIGHT, 'transport'),
        'banner_img_web' => $faker->imageUrl(Banner::WEB_WIDTH, Banner::WEB_HEIGHT, 'transport'),
        'order' => $faker->numberBetween(1, 100),
        'active' => $faker->boolean,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
