<?php

namespace App\Livewire;

use App\Http\Controllers\TaskController;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class TasksContainer extends Component
{
    public Collection|array $tasks = [];
    public int $projectId;
    private TaskController $taskController;

    public function __construct()
    {
        $this->taskController = new TaskController();
    }

    public function mount()
    {
       $this->tasks = $this->taskController->get($this->projectId);
    }
    public function render()
    {
        return view('livewire.tasks-container');
    }
}
