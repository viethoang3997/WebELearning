<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CourseTag;
use Faker\Generator as Faker;

$factory->define(CourseTag::class, function (Faker $faker) {
    return [
        'course_id' => $faker->numberBetween(67, 93),
        'tag_id' => $faker->numberBetween(3, 10)
    ];
});
