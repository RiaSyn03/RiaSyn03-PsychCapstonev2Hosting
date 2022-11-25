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
            $table->string('user_fname');
            $table->string('user_idnum');
            $table->enum('status', ['Pending', 'Re-Schedule', 'Accepted', 'Done'])->default('Pending');
            $table->string('date');
            $table->string('counselor_name');
            $table->string('user_email');
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
