<?php

namespace App;

use App\Notifications\UserRegistered;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\HasRole;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idnum','fname', 'mname', 'lname', 'course_id', 'role_id', 'year', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

   public function hasAnyRoles($roles) {
    return null !== $this->roles()->whereIn('role_name', $roles)->first();
   }
   public function hasAnyRole($role) {
    return null !== $this->roles()->where('role_name', $role)->first();
   }
}
