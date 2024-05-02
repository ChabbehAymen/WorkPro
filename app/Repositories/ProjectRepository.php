<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository extends BaseRepo
{
   public function get($params = null): Collection|array
   {
       return $this->model->query()
           ->where('user_id', '=', $params)
           ->get();
   }

   public function getCollaborators($projectID): Collection|array
   {
       return User::query()->select('user_name', 'profile_img', 'user_id', 'project_id')
           ->join('colobrators', 'colobrators.user_id', '=', 'users.id')
           ->where('project_id', '=', $projectID)
           ->get();
   }

}
