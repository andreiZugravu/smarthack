<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * @param Request $request
     * index action of the controller
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }

    /**
     * @param User $user
     * show action
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $validator = User::validate($request);

        if($validator->fails())
        {
            return new JsonResponse([
                'message' => $validator->errors()->first(),
                'type' => 'error'
            ]);
        }

        User::updateOrCreate(['id' => $request->id], $request->all());
    }

    /**
     *
     */
    public function remove()
    {

    }
}
