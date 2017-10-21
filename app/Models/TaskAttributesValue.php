<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskAttributesValue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_id', 'task_attribute_id', 'value'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* none */

    /**
     *
     */
    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }

    /**
     *
     */
    public function task_attribute()
    {
        return $this->belongsTo('App\Models\TaskAttribute');
    }
}
