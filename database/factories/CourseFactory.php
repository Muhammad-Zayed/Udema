<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;


$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => 'photos/OqkOwQLaBOL9JHB0q5UGjdM8YQtpt1Csa8Phlhl7.jpg',
        'price' => 1200,
        'short_description'=> $faker->sentence(10),
        'long_description' => $faker->paragraphs(5, true),
    ];
});
