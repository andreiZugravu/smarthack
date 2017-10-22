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
        $users = User::whereNotIn('id', $team->users->pluck('id'))->get();

    	return view('teams.show', ['team' => $team, 'users' => $users, 'tasks' => $team->tasks]);
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

       $team = Team::updateOrCreate(['id' => $team->id], $request->all());

       Auth::user()->teams()->syncWithoutDetaching([$team->id]);

       return redirect()->back();
   }

   /**
    *
    */
   public function remove(Team $team)
   {
       $team->delete();

       return redirect(route('teams.index'));
   }

   /**
    *
    */
   public function addUser(Request $request, Team $team)
   {
       if(!$team->users()->find(Auth::user()->id))
       		abort(403);

       if (!isset($request->user_id) || !User::find($request->user_id)) {
           abort(404);
       }

       if(!$team->users()->find($request->user_id)) //not a part of the team already, eligible to add
       {
           $team->users()->attach($request->user_id);
           return redirect()->back();
       }
       else
       {
           return new JsonResponse([
               'message' => 'Member already a part of the team',
               'type' => 'error'
           ]);
       }
   }

   /**
    *
    */
   /*public function removeUser(Team $team, $id)
   {
       if(Auth::user() != $team->leader())
       		App::abort(403);

       if($team->users()->first($id)) //part of the team, eligible to remove
       {
           $team->users()->detach($id);
           return new JsonResponse([
               'message' => 'Member successfully removed from the team',
               'type' => 'success'
           ]);
       }
       else
       {
           return new JsonResponse([
               'message' => 'Member not a part of the team',
               'type' => 'error'
           ]);
       }
   }*/

    public function removeUser(Request $request, Team $team)
    {
        if (!isset($request->user_id) || !User::find($request->user_id)) {
            abort(404);
        }

        if($team->users()->find($request->user_id))
        {
            $team->users()->detach($request->user_id);
            return redirect()->back();
        }
        else
        {
            return new JsonResponse([
                'message' => 'Member not a part of the team',
                'type' => 'error'
            ]);
        }
    }
}
