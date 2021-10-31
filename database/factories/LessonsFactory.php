<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lesson;
use Faker\Generator as Faker;

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'url' =>"https://www.youtube.com/watch?v=bHvSfxyNkeA",
        'name'=>$faker->name(),
        'duration' => 5,

    ];
});
