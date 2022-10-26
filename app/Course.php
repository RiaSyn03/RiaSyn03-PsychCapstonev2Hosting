<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name','department',
    ];

    public function users() {
        return $this->belongsToMany( 'App\User');
    }
}
