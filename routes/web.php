<?php

use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectTasksController;
use App\Http\Controllers\CompletedTasksController;
use Illuminate\Filesystem\Filesystem;
use App\Twitter;

// use App\Repositories\UserRepository;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// Route::get('/', function(UserRepository $users) {
//   dd($users);
// });
class Example  {

  public function index() {
    return 'hello';
  }
}

app()-> singleton('example', function() {
  return 'hello';
});



Route::get('/', function (Twitter $twitter) {
  dd($twitter);
  dd(app(Example::class), app(Twitter::class));
  return view('welcome');
});


Route::resource('projects', ProjectsController::class);
// ->middleware('can:update,project');

Route::patch('/tasks/{task}', [ProjectTasksController::class, 'update']);

Route::post('/projects/{project}/tasks', [ProjectTasksController::class, 'store']);

Route::post('/completed-tasks/{task}', [CompletedTasksController::class, 'store']);
Route::delete('/completed-tasks/{task}', [CompletedTasksController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
