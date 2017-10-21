<?php

namespace App\Models;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\Validator;

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
     * Rules
     */
    public static $rules = [
        'name'  => ['min:4', 'max:191', 'required'],
        'email' => ['email', 'required', 'max:191', 'unique:'],
        'password' => ['min:6', 'required', 'confirmed']
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

    /**
     * Validate function
     */
    public static function validate(Request $request)
    {
        return \Validator::make($request->all(), [
            'name' => 'required|max:191|min:6',
            'email' => 'required|email|max:191|unique:users,email' . (($request->id) ? ",$request->id" : ''),
            'password' => 'required|min:6|max:191'
        ]);
//        return Validator::make($request->all(), self::$rules);
    }
}

/*
 * if($validator->fails())
        {
            return new JsonResponse([
                'message' => $validator->errors()->first(),
                'type' => 'error'
            ]);
        }
        else
            return true;
 */