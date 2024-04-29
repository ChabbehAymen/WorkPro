<?php

namespace App\Livewire;

use Livewire\Component;

class Dialog extends Component
{
    public $message;

    public function render()
    {
        return view('livewire.dialog');
    }
}
