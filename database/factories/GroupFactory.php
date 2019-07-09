<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'description' => $faker->text(255),
        'type' => Group::TYPE_STATIC
    ];
});
