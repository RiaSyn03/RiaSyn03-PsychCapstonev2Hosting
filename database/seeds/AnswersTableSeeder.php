<?php

use Illuminate\Database\Seeder;
use App\Answer;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::truncate();

        Answer::create(['answer_name' => 'Not at all', 'answer_value' => '0']);
        Answer::create(['answer_name' => 'Several days', 'answer_value' => '1']);
        Answer::create(['answer_name' => 'More than half the days', 'answer_value' => '2']);
        Answer::create(['answer_name' => 'Nearly everyday', 'answer_value' => '3']);
    }
}
