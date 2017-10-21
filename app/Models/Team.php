<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;


class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description', 'lead', 'created_by'
    ];

    /**
     * The validation rules.
     *
     * @var array
     */
    public static $rules = [
         'display_name' => ['min:4, max:191']
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* none */

    /**
     * Validate Function
     *
     * @var array
     */
    public static function validate(Request $request)
    {
        return Validator::make($request->all(), self::$rules);
    }

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