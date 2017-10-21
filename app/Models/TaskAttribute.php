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
        'name', 'displayName', 'description', 'task_attribute_id'
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
        return $this->belongsToMany('App\Models\Task', 'task_attributes_join',
            'task_attribute_id', 'task_id',
            'task_attribute_id', 'id');
    }
}
