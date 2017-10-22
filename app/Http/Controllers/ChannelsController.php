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
        $channels = User::find(Auth::user()->id)->channels()->get();
        //return $channels;
        return view('channels.index', ['channels' => $channels]);
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

       $request->merge([
          'name' => str_slug($request->display_name),
          'created_by' => Auth::id()
       ]);

       Channel::updateOrCreate(['id' => $channel->id], $request->all());
       return new JsonResponse([
           'message' => 'Success',
           'type' => 'success'
       ]);
   }

   /**
    *
    */
   public function remove(Channel $channel)
   {
       $channel->delete();
       return new JsonResponse([
           'message' => 'Successfully deleted',
           'type' => 'success'
       ]);
   }
}

