<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class ProjectCard extends Component
{
    public string $title;

    public int $id;

    public int $isShared = 0;

    public function render(): view
    {
        return view('livewire.project-card');
    }
}
