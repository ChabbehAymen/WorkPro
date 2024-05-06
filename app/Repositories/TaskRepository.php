<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

class TaskRepository extends BaseRepo
{
    public function get($params = null): Collection|array
    {
        $query = $this->model->query()
            ->where('project_id', '=',$params['projectId']);
        if ($params['userId'] !== null) $query->where('user_id', '=', $params['userId']);
        return $query->get();
    }

}
