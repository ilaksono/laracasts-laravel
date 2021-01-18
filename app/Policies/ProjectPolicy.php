<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can view the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Project  $project
   * @return mixed
   */
  // public function view(User $user, Project $project)
  // {
  //   //
  //   return $project->owner_id == $user->id;
  // }

  public function update(User $user, Project $project)
  {
    //
    return $project->owner_id == $user->id;

  }

}
