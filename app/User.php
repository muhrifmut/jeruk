<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

<<<<<<< HEAD
class user extends Authenticatable
=======
class User extends Authenticatable
>>>>>>> 322db19f3fbe8b6bdf731a12c5f972208c314ef1
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'name', 'email', 'password', 'status',
=======
        'name', 'email', 'password',
>>>>>>> 322db19f3fbe8b6bdf731a12c5f972208c314ef1
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
<<<<<<< HEAD

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
=======
>>>>>>> 322db19f3fbe8b6bdf731a12c5f972208c314ef1
}
