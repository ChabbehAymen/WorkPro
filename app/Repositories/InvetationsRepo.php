<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class InvetationsRepo extends BaseRepo
{

    public function get($params = null): Collection|array
    {
        return $this->model->query()
            ->select('users.id As user_id','user_name', 'profile_img', 'projects.id', 'title')
            ->join('users', 'sender_id', '=', 'users.id')
            ->join('projects', 'project_id', '=', 'projects.id')
            ->where('receiver_id', '=', Auth::id())
            ->get();
    }

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
