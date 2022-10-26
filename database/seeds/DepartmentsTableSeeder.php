<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'dept_name' => 'Department of Computer and Information Sciences(DCIS)',
        ]);
        DB::table('departments')->insert([
            'dept_name' => 'Department of Computer Engineering(DE)',
        ]);
        DB::table('departments')->insert([
            'dept_name' => 'Department of Civil Engineering(DE)',
        ]);
    }
}
