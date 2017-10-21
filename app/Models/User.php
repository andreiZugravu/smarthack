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
        return $this->belongsToMany('App\Models\Team', 'user_team_join', 'user_id', 'team_id');
    }

    /**
     * The channels that the user is involved in
     */
    public function channels()
    {
        return $this->belongsToMany('App\Models\Channel', 'channel_user_join', 'user_id', 'channel_id');
    }

    /**
     * The messages that the user posted somewhere
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    /**
     * The tasks of this user
     */
    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task', 'task_user_join', 'user_id', 'task_id');
    }

    /**
     * The tasks that this user created/assigned
     */
    public function created_tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
