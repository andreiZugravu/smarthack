<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Auth;


class TeamsController extends Controller
{
    //
    public function index() {
        $teams = User::find(Auth::user()->id)->teams()->get();
        return view('teams.index', ['teams' => $teams]);
    }

    public function show(Team $team) {
    	return view('teams.show', ['team' => $team]);
    }

    public function store(Request $request, Team $team)
   {
       $validator = Team::validate($request);

       if($validator->fails())
       {
           return new JsonResponse([
               'message' => $validator->errors()->first(),
               'type' => 'error'
           ]);
       }

       $request->merge([
       		'name' => str_slug($request->display_name),
       		'lead' => Auth::id(),
       		'created_by' => Auth::id()
       ]);

       Team::updateOrCreate(['id' => $team->id], $request->all());
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

   /**
    *
    */
   public function add_user(Team $team, $id)
   {
       $user = User::find($id);

   }
}
