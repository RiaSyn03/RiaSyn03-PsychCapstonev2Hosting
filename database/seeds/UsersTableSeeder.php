<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('timeslots')->truncate();

        $adminRole = Role::where('name', 'admin') -> first();
        $councilourRole = Role::where('name', 'councilour') -> first();
        $studentRole = Role::where('name', 'student') -> first();
        
        $admin = User::create([
            'role_id' => '1',
            'course_id' => '0',
            'idnum' => '11111111',
            'fname' => 'Admin',
            'mname' => 'Ad',
            'lname' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt ('admin')
        ]);

        $councilour = User::create([
            'role_id' => '2',
            'course_id' => '0',
            'idnum' => '22222222',
            'fname' => 'Councilour',
            'mname' => 'Co',
            'lname' => 'Councilour',
            'email' => 'councilour@councilour.com',
            'password' => bcrypt ('councilour')
            
        ]);

        $student = User::create([
            'role_id' => '3',
            'course_id' => '1',
            'idnum' => '33333333',
            'fname' => 'Student',
            'mname' => 'St',
            'lname' => 'Student',
            'email' => 'student@student.com',
            'password' => bcrypt ('student')
        ]);

        $kyle = User::create([
            'role_id' => '3',
            'course_id' => '2',
            'idnum' => '15105515',
            'fname' => 'Kyle Christian',
            'mname' => 'Misa',
            'lname' => 'Arches',
            'email' => 'kurumitokisaki0324@gmail.com',
            'password' => bcrypt ('Kurumitokisaki')
        ]);

        $admin -> roles() -> attach($adminRole);
        $councilour->roles()->attach($councilourRole);
        $student->roles()->attach($studentRole);
        $kyle->roles()->attach($studentRole);

        // factory(App\User::class, 5)->create();
    }


}
