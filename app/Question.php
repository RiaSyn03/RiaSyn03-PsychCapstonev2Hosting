<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'id' ,
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
}
