<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected TaskRepository $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository(new Task());
    }

    public function get($projectId,Request $request = null) : Collection|array
    {
        if ($request) $this->taskRepository->get(['projectId'=>$projectId, 'userId'=>$request->input('filter')]);
        return $this->taskRepository->get(['projectId'=>$projectId ,'userId'=>null]);
    }
    public function store(Request $request){}

}
