<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'course_name' => 'Bachelor of Science in Information Communication and Technology(BS_ICT)',
            'dept_id' => '1',
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Bachelor of Science in Information Technology(BS_IT)',
            'dept_id' => '1',
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Bachelor of Science in Information Science(BS_IS)',
            'dept_id' => '1',
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Bachelor of Science in Computer Engineering(BS_CE)',
            'dept_id' => '2',
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Bachelor of Science in Civil Engineering(BS_CE)',
            'dept_id' => '3',
        ]);
    }
}
