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
        $this->call(RolesTableSeeder::class);
<<<<<<< HEAD
        $this->call(AnswersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
       
=======
        $this->call(UsersTableSeeder::class);
>>>>>>> 106ca1a483bdf725dccae9f53e85da85d3cea71b
         
    }
}

