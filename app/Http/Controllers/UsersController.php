<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
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
    public function store(Request $request, User $user)
    {
        $validator = User::validate($request);

        if($validator->fails())
        {
            return new JsonResponse([
                'message' => $validator->errors()->first(),
                'type' => 'error'
            ]);
        }

        User::updateOrCreate(['id' => $user->id], $request->all());
        return new JsonResponse([
            'message' => 'Success',
            'type' => 'success'
        ]);
    }

    /**
     *
     */
    public function remove(User $user)
    {
        $user->delete();
    }
}
