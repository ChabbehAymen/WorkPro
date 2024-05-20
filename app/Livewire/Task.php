<?php

namespace App\Livewire;

use Livewire\Component;

class Task extends Component
{

    public $img;

    public $title;

    public $discreption;

    public function render()
    {
        return view('livewire.task');
    }
}
