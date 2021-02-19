<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password', 'gender', 'age','sentence','pic',
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

    public function prefecture()
    {
        return $this->belongsTo('App\Prefecture');
    }

    public function interests()
    {
        return $this->belongsToMany('App\Interest');
    }

    public function senduser()
    {
        return $this->hasMany('App\Good', 'send_id', 'id');
    }

    public function receiveuser()
    {
        return $this->hasMany('App\Good', 'receive_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function matchingUsers()
    {
        return $this->hasMany('App\MatchingUser');
    }
}
