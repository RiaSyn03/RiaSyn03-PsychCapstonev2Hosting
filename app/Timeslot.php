<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    protected $fillable = [
        'id' ,
        'user_id', 
        'time',
        'date',
        'status',
        'counselor_name',
        'user_email',
         ];
}
