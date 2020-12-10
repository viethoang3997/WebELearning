<?php

use Illuminate\Database\Seeder;
use App\Models\CourseUser;

class CourseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CourseUser::class, 15)->create();
    }
}
