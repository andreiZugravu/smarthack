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
        'name', 'display_name', 'description'
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
        return $this->belongsToMany('App\Models\User', 'user_team_join', 'team_id', 'user_id');
    }

    /**
     * The tasks that this team has
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}