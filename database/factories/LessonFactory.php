<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lesson;
use Faker\Generator as Faker;

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
        'description' => $faker->text(100),
        'requirement' => $faker->text(100),
        'time' => $faker->numberBetween(1, 100),
        'course_id' => $faker->numberBetween(67, 90)
    ];
});
