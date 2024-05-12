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

    public function store($projectId, Request $request)
    {
        $data = $request->validateWithBag('createTask', [
            'title' => ['bail', 'required', 'max:50'],
            'description' => ['required'],
            'img' => ['file', 'optional']
        ]);
        $this->taskRepository->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'status'=>0,
            'project_id' => $projectId,
            'user_id' => auth()->id()
        ]);
        return redirect()->route('main', [$projectId]);
    }

    public function get($projectId, Request $request = null): Collection|array
    {
        if ($request) $this->taskRepository->get(['projectId' => $projectId, 'userId' => $request->input('filter')]);
        return $this->taskRepository->get(['projectId' => $projectId, 'userId' => null]);
    }

}
