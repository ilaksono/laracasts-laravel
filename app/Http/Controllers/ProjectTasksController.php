<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
  public function store(Project $project)
  {
    $attributes = request()->validate([
      'description' => 'required|max:255',
    ]);
    $project->addTask($attributes);
    return back();
  }

  public function update(Task $task)
  {
    // if (request()->has('completed')) {
    //   $task->complete();
    // } else {
    //   $task->incomplete();
    // }

    $method = request()->has('completed')
    ? 'complete' : 'incomplete';
    $task->$method();

    
    // request()->has('completed') ?
    // $task->complete() : $task->incomplete();
    return back();
  }
}
