<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskAttribute extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description', 'task_attribute_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* none */

    /**
     * The tasks that this is an attribute of
     */
    public function tasks()
    {
        return $this->hasManyThrough('App\Models\Task', 'App\Models\TaskAttributesValue');
    }

    /**
     * The values of this attribute
     */
    public function values()
    {
        return $this->hasMany('App\Model\TaskAttributesValue');
    }
}
