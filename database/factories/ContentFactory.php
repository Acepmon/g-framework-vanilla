<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {
    // $type = Content::TYPE_ARRAY[array_rand(Content::TYPE_ARRAY)];
    $type = array_rand_value(Content::TYPE_ARRAY);
    // $status = Content::STATUS_ARRAY[array_rand(Content::STATUS_ARRAY)];
    $status = array_rand(Content::STATUS_ARRAY);
    // $visibility = Content::VISIBILITY_ARRAY[array_rand(Content::VISIBILITY_ARRAY)];
    $visibility = array_rand(Content::VISIBILITY_ARRAY);

    $title = $faker->company;
    $slug = \Str::slug($title, '-');
    $author_id = 1;

    return [
        'title' => $title,
        'slug' => $slug,
        'type' => $type,
        'status' => $status,
        'visibility' => $visibility,
        'author_id' => $author_id,
    ];
});
