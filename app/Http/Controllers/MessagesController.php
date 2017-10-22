<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Validator;
use Illuminate\Http\JsonResponse;
use Auth;
use App\Models\Channel;

class MessagesController extends Controller
{
    /**
     * index action
     */
    public function index(Channel $channel)
    {
        $messages = $channel->messages()->get();
        //return $messages;
        return view('messages.index', ['messages' => $messages]);
    }

    /**
     * store action
     */
    public function store(Request $request, Message $message)
    {
        //normalize request
        $request->merge(array_map('trim', $request->all()));

        //get input text
        $text = $request->input('text');

        //validate
        $validator = Message::validateRequest($request);

        $validator->fails();

        //check failure
        if($validator->fails())
        {
            return new JsonResponse([
                'message' => $validator->errors()->first(),
                'type' => 'error'
            ]);
        }
        else
        {

            $request->merge([
               'created_by' => Auth::id(),

            ]);
            Message::updateOrCreate(['id' => $message->id], $request->all());
            return new JsonResponse([
                'message' => 'Success',
                'type' => 'success'
            ]);
        }
    }

     /**
    *
    */
   public function remove(Message $message)
   {
       $message->delete();
       return new JsonResponse([
           'message' => 'Successfully deleted',
           'type' => 'success'
       ]);
   }
}
