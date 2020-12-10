<?php

use Illuminate\Database\Seeder;
use App\Models\CourseTag;

class CourseTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CourseTag::class, 50)->create();
    }
}
