<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Http\JsonResponse;


class TeamsController extends Controller
{
    //
    public function index() {
        $teams = Team::all();
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

       $name = str_slug($request->input('display_name'));

       Team::updateOrCreate(['id' => $team->id], $request->all() + ['name' => $name]);
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
   }
}
