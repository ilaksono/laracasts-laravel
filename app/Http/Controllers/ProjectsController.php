<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreated;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['index']);
  }
  public function index()
  {
    // auth()->id() // null if guest, id if signed in
    // auth() -> user() // return user object
    // auth() -> check() // returns boolean
    // if(auth() -> guest()) ...
    // $projects = Project::where('owner_id', auth()->id())->get();
    // $projects = Project::all();

    // cache()->rememberForever('stats', function () {
    //   return ['lessons' => 1300, 'hours' => 50000];
    // });

    // $projects = auth()->user()->projects;
    // return view('projects.index', [
    //   'projects' => $projects,
    // ]);

    return view('projects.index', [
      'projects' => auth()->user()->projects,
    ]);
  }

  public function create()
  {
    return view('projects.create');
  }

  public function store()
  {

    $attributes = $this->validateProject();
    $attributes['owner_id'] = auth()->id();
    $project = Project::create($attributes);

    \Mail::to('brotherlaksono@gmail.com')->send(
      new ProjectCreated($project)
    );
    return redirect('/projects');
  }

  public function destroy(Project $project)
  {
    $project->delete();
    abort_if(\Gate::denies('update', $project), 403);
    return redirect('/projects');
  }

  public function show(Project $project)
  {
    // $this->authorize('view', $project);
    // abort_unless(auth()->user()->owns($project), 403);
    // abort_if($project-> owner_id !== auth()->id(), 403);
    abort_if(\Gate::denies('update', $project), 403);

    return view('projects.show', compact('project'));
  }

  public function update(Project $project)
  {
    $this->validateProject();
    $this->authorize('update', $project);
    $project->update(request(['title', 'description']));
    return redirect('/projects');
  }
  public function edit(Project $project)
  {
    $this->authorize('update', $project);
    return view('projects.edit', compact('project'));
  }

  protected function validateProject()
  {
    return request()->validate([
      'title' => ['required', 'min:3', 'max:255'],
      'description' => ['required', 'min: 3'],
    ]);

  }
}
