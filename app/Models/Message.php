<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'created_by', 'parent_id', 'channel_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* none */

    /**
     * The channel that the message is a part of
     */
    public function channel()
    {
        return $this->belongsTo('App\Models\Channel');
    }

    /**
     * The user that posted the message
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
