<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'name' => 'learn'
            ],

            [
                'name' => 'code'
            ],

            [
                'name' => 'laravel'
            ],

            [
                'name' => 'php'
            ],

            [
                'name' => 'html'
            ],

            [
                'name' => 'css'
            ],

            [
                'name' => 'jquery'
            ],
            
            [
                'name' => 'js'
            ],
        ]);
    }
}
