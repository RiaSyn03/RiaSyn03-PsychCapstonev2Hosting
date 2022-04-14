<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeslotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeslots', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('time');
<<<<<<< HEAD
            $table->string('user_fname');
            $table->string('user_idnum');
=======
            $table->integer('user_id')->unsigned();
>>>>>>> 106ca1a483bdf725dccae9f53e85da85d3cea71b
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeslots');
    }
}
