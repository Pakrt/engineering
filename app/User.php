<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function crew()
    {
        return $this->hasOne('App\Crew');
    }

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/nouser.jpg');
        }
        return asset('images/'. $this->avatar);
    }

    public function income()
    {
        return $this->hasMany('App\Income');
    }

    public function outcome()
    {
        return $this->hasMany('App\Outcome');
    }

    public function history()
    {
        return $this->hasMany('App\History');
    }

    public function downtime()
    {
        return $this->hasMany('App\Downtime');
    }
}
