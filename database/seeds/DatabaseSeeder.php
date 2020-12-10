<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CourseTableSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(CourseUserSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(CourseTagSeeder::class);
    }
}
