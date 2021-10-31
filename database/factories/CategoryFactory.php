<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => 'photos/OqkOwQLaBOL9JHB0q5UGjdM8YQtpt1Csa8Phlhl7.jpg',
    ];
});
