<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

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
     * The validation rules.
     *
     * @var array
     */
    public static $rules = [
         'display_name' => ['required', 'min:4, max:191'],
         'status_id' => ['required', 'integer', 'exists:statuses,status_id'],
         'team_id' => ['required', 'integer', 'exists:teams,id'],
         'priority' => ['required']
    ];

    /**
     * Validate Function
     *
     * @var array
     */
    public static function validate(Request $request)
    {
        return Validator::make($request->all(), self::$rules);
    }

    public static function normalizeRequest(Request $request)
    {
        $request->merge(array_map('trim', $request->all()));
        $request->merge(['name' => str_slug($request->display ?? '')]);

        if (!isset($request->id)) {
            $request->merge(['created_by' => \Auth::id()]);
        }
    }

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
    public function users() //write users instead of members, so we won't go into any ambiguity later on
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
