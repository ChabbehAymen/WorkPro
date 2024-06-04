<?php

namespace App\Livewire;

use App\Http\Controllers\AssignmentsController;
use App\Models\Assignment;
use Livewire\Component;

class Task extends Component
{

    public $img;

    public $title;

    public $date;

    public $task_id;

    public $state;

    private $assingnmentConttroller;

    public $assignemts;

    public function __construct()
    {
        $this->assingnmentConttroller = new AssignmentsController();

    }

    public function mount(){
        $this->assignemts = $this->assingnmentConttroller->get($this->task_id);
    }
    public function render()
    {
        return view('livewire.task');
    }
}
