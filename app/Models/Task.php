<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description', 'created_by', 'deadline', 'status_id', 'team_id', 'priority'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* none */

    /**
     * The user that this task belongs to
     */
    public function created_by()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * The users that this task is assigned to
     */
    public function users() //write members instead of users, so we won't go into any ambiguity later on
    {
        return $this->belongsToMany('App\Models\User', 'task_user_join', 'task_id', 'user_id');
    }

    /**
     * The team that the current task belongs to
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    /**
     * The state of the current task
     */
    public function status()
    {
        return $this->hasOne('App\Models\Status');
    }

    /**
     * The checkboxes of the current task
     */
    public function checkboxes()
    {
        return $this->hasMany('App\Models\Checkbox');
    }

    /**
     * The values of the attributes of this task
     */
    public function task_attributes_values()
    {
        return $this->hasMany('App\Models\TaskAttributesValue');
    }

    /**
     * The attributes of this task
     */
    public function task_attributes()
    {
        return $this->hasManyThrough('App\Models\TaskAttribute', 'App\Models\TaskAttributesValue'); //edit it ***!!!F
    }
}
