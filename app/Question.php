<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'id' ,
<<<<<<< HEAD
        'question_name' ,
         ];

public function answers()
{
    return $this->belongsToMany( 'App\Answers');
}
public function hasAnyAnswers()
{
    return null !== $this->answers()->whereIn('answer_name', $answers)->first();
}
=======
        'category_type' ,
        'type',
        'question',
         ];
>>>>>>> 106ca1a483bdf725dccae9f53e85da85d3cea71b
}
