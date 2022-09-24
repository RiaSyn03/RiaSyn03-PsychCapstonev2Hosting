<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Done extends Model
{
    protected $fillable = [
        'id' ,
        'user_id', 
        'status',
        'time',
        'date',
        'councilour_name',
         ];
}
