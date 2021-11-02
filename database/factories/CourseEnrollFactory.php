<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CourseEnroll;
use Faker\Generator as Faker;

$factory->define(CourseEnroll::class, function (Faker $faker) {
    return [
        'is_confirmed' => rand(0,1)
    ];
});
