<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  use HasFactory;
  // protected $fillable = [
  //     'title',
  //     'description',
  // ];
  protected $guarded = [
  ];
  public function tasks()
  {
    return $this->hasMany(Task::class);
  }
  public function addTask($task)
  {
    return $this->tasks()->
      create($task);
    //  return Task::create([
    //     'description' => $description,
    //     'project_id' => $this->id,
    //   ]);
  }
}
