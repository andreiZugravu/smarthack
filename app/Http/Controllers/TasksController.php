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
}
