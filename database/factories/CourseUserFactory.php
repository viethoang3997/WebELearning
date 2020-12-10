<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CourseUser;
use Faker\Generator as Faker;

$factory->define(CourseUser::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 5),
        'course_id' => $faker->numberBetween(67, 68),
        'lesson_id' => $faker->numberBetween(16, 30),
    ];
});
