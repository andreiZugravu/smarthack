<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Auth;

class TasksController extends Controller
{
    //
    public function index() {
        $tasks = User::find(Auth::user()->id)->tasks()->get();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function show(Task $task) {
    	return view('teams.show', ['task' => $task]);
    }

    public function store(Request $request, Task $task)
   {
       if(Auth::user() != $task->team()->leader())
       		App::abort(403);

       $validator = Task::validate($request);

       if($validator->fails())
       {
           return new JsonResponse([
               'message' => $validator->errors()->first(),
               'type' => 'error'
           ]);
       }

       $request->merge([
       		'name' => str_slug($request->display_name),
       ]);

       Team::updateOrCreate(['id' => $task->id], $request->all());
       return new JsonResponse([
           'message' => 'Success',
           'type' => 'success'
       ]);
   }

   /**
    *
    */
   public function remove(Task $task)
   {
       $task->delete();
       return new JsonResponse([
           'message' => 'Successfully deleted',
           'type' => 'success'
       ]);
   }

    public function addUser(Request $request, Task $task)
    {
        if (!isset($request->user_id) || !User::find($request->user_id)) {
            abort(404);
        }

        if(!$task->users()->find($request->user_id))
        {
            $task->users()->attach($request->user_id);
            return redirect()->back();
        }
        else
        {
            return new JsonResponse([
                'message' => 'Member already assigned to the task',
                'type' => 'error'
            ]);
        }
    }

    public function removeUser(Request $request, Task $task)
    {
        if (!isset($request->user_id) || !User::find($request->user_id)) {
            abort(404);
        }

        if($task->users()->find($request->user_id))
        {
            $task->users()->detach($request->user_id);
            return redirect()->back();
        }
        else
        {
            return new JsonResponse([
            'message' => 'Member not assigned to the task',
            'type' => 'error'
        ]);
        }
    }
}
