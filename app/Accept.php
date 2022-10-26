<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accept extends Model
{
    protected $fillable = [
        'id' ,
        'user_id', 
        'time',
        'date',
        'councilour_name',
         ];
}
