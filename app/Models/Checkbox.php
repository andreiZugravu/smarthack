<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkbox extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'completed', 'task_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* none */

    /**
     * The tasks that the current checkbox belongs to
     */
    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }
}
