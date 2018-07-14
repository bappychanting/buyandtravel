<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'contact', 'dob', 'gender', 'address', 'role', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

        // A User has many Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

        // A User has many Travel Schedules
    public function travels()
    {
        return $this->hasMany(Travel::class);
    }

        // A User has many Offers
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
