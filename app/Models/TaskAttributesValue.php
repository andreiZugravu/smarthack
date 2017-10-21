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
        'value', 'task_attribute_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* none */

    /**
     * Connect the values ?
     */
    public function task() /* Use hasManyThrough, since "hasOneThrough" does not exist, it's okay */
    {
        return $this->hasManyThrough(); //just one
    }
}
