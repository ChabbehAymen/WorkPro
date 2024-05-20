<?php


namespace App\Repositories;

use App\Models\Colobrator;
use Illuminate\Database\Eloquent\Collection;

class AssignmentRepository extends BaseRepo
{

    public function get($params = null): array|Collection{
        return $this->model->query()
        ->select()
        ->where('project_id', '=', $params['project_id'])
        ->where('task_id')
        ->get();
    }
    
}
