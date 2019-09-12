<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'slug' => \Str::slug($faker->company, '-'),
        'type' => Content::TYPE_ARRAY[array_rand(Content::TYPE_ARRAY)],
        'status' => Content::STATUS_ARRAY[array_rand(Content::STATUS_ARRAY)],
        'visibility' => Content::VISIBILITY_ARRAY[array_rand(Content::VISIBILITY_ARRAY)],
        'author_id' => 1,
    ];
});
