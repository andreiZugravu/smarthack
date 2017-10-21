<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Auth;


class ChannelsController extends Controller
{
    //
    public function index() {
        $teams = User::find(Auth::user()->id)->channels()->get();
        return $channels;
        //return view('channels.index', ['channels' => $channels]);
    }

    public function show(Channel $channel) {
    	return view('channels.show', ['channel' => $channel]);
    }

    public function store(Request $request, Channel $channel)
   {
       $validator = Channel::validate($request);

       if($validator->fails())
       {
           return new JsonResponse([
               'message' => $validator->errors()->first(),
               'type' => 'error'
           ]);
       }

       $name = str_slug($request->input('display_name'));

       Channel::updateOrCreate(['id' => $channel->id], $request->all() + ['name' => $name]);
       return new JsonResponse([
           'message' => 'Success',
           'type' => 'success'
       ]);
   }

   /**
    *
    */
   public function remove(Team $team)
   {
       $team->delete();
       return new JsonResponse([
           'message' => 'Successfully deleted',
           'type' => 'success'
       ]);
   }
}
