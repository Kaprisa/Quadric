<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function add(Request $request)
    {
      $task = Task::create([
          'description' => $request->description,
          'name' => $request->name,
          'executor_id' => $request->executor_id,
          'creator_id' => Auth::guard('api')->id()
      ]);
      foreach ($request->tags as $tag) {
          $t = Tag::firstOrCreate(['name' => $tag]);
          $task->tags()->attach($t->id);
      }
      return null;
    }
}
