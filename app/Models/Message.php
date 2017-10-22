<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;

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

    /**
     * Validate function
     */
    public static function validateRequest(Request $request)
    {
        return Validator::make($request->all(), [
            'text' => 'required|max:191|string',
            //'parent_id' => 'nullable|exists:messages, id',
            //'channel_id' => 'required|exists:channels, id'
        ]);
//        return Validator::make($request->all(), self::$rules);
    }
}
