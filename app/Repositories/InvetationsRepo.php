<?php

namespace App\Repositories;

class InvetationsRepo extends BaseRepo
{


    public function find($params)
    {
        return $this->model->query()
            ->where('receiver_id', '=', $params['user_id'])
            ->where('project_id', '=', $params['project_id'])
            ->get();
    }

    public function delete($params)
    {
        return $this->model->query()
            ->where('receiver_id', '=', $params['user_id'])
            ->where('project_id', '=', $params['project_id'])
            ->delete();
    }

}
