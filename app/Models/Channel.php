<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description', 'created_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* none */

    /**
     * The users that are part of the channel
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'channel_user_join', 'channel_id', 'user_id');
    }

    /**
     * The messages that are within the channel
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }
}
