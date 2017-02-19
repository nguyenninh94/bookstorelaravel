<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password','username','verified','token',
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function contact()
    {
        return $this->hasMany('App\Contact');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user)
        {
            $user->token = str_random(40);
        });
    }
}
