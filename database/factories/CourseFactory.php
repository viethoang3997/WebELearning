<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(Course::class, function (Faker $faker) {
    $image = '/storage/image/Ellipse10.png';
    return [
        'name' => $faker->name,
        'image' => $image,
        'description' => $faker->text(200),
        'price' => $faker->numberBetween(100, 500)
    ];
});
