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
            'title' => ['bail', 'required', 'max:50', 'min:4'],
            'description' => ['required'],
        ]);

        $request->validate([
            'img' => ['image', 'mimes:jpeg,png,jpg'],
        ]);
        if ($request->file('img') != null) {
            $photo = $request->file('img');
            $fileName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('asset/imags'), $fileName);
            $data['img'] = 'asset/imags/' . $fileName;
        }
        $data['project_id'] = $projectId;
        $data['user_id'] = auth()->id();
        $this->taskRepository->create($data);
        return redirect()->route('main', [$projectId]);
    }

    public function get($projectId, Request $request = null): Collection|array
    {
        if ($request) $this->taskRepository->get(['projectId' => $projectId, 'userId' => $request->input('filter')]);
        return $this->taskRepository->get(['projectId' => $projectId, 'userId' => null]);
    }

    public function delete($task_id)
    {
        $this->taskRepository->delete($task_id);
        return back();
    }

    public function updateState(Request $request, $id)
    {
        $this->taskRepository->update($id, ['status' => $request->status]);
        return back();
    }

    public function find($id)
    {
        $data = $this->taskRepository->find($id);
        return view('editetask', compact('data'));
    }

    public function edit($id, Request $request)
    {
        $this->taskRepository->update(
            $id,
            [
                'title' => $request->title,
                'description' => $request->description
            ]
        );
        return back();
    }
}
