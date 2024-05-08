<?php

namespace App\Repositories;

use App\Models\Colobrator;
use Illuminate\Database\Eloquent\Collection;

class CollaborationsRepo extends BaseRepo
{
    public function get($params = null): Collection|array
    {
        return $this->model->query()
            ->select()
            ->join('projects', 'project_id', '=', 'id')
            ->where('colobrators.user_id', '=', $params)
            ->get();
    }

    public function delete($params)
    {
        return $this->model->query()
            ->where('user_id', '=', $params['user_id'])
            ->where('project_id', '=', $params['project_id'])
            ->delete();
    }

}