<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Validator;

class MessagesController extends Controller
{
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
            Message::updateOrCreate(['id' => $message->id], $request->all());
            return new JsonResponse([
                'message' => 'Success',
                'type' => 'success'
            ]);
        }
    }
}
