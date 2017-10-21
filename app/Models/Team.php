<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'displayName', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* none */

    /**
     * The users that are part of the team
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}