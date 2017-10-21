<?php

namespace App\Models;

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
        'name', 'email', 'password',
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
     * The teams that the user can be a part of
     */
    public function teams()
    {
        return $this->belongsToMany('App\Models\Team');
    }

    /**
     * The channels that the user is involved in
     */
    public function channels()
    {
        return $this->belongsToMany('App\Models\Channel');
    }

    /**
     * The messages that the user posted somewhere
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }
}
