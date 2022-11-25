<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function showresults(){
        return $this->belongsTo('App\User', 'user_id');
        }
        
    protected $fillable = [
        'id' ,
        'user_id', 
        'result_name',
         ];
    
}
