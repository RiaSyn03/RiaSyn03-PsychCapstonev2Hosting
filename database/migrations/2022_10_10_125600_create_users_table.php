<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('role_id');
            $table->integer('idnum');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->enum('year', ['1st Year', '2nd year', '3rd Year', '4th Year', '5th Year', 'Non-Student']);
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
