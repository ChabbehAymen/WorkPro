<?php

namespace App\Livewire;

use App\Http\Controllers\CollaboratorController;
use App\Models\Colobrator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavBar extends Component
{
    public  Collection|array $projects = [];
    public  Collection|array $collabs = [];

    private CollaboratorController $collaboratorController;
    public int $selectedID;

    public function __construct()
    {
        $this->collaboratorController = new CollaboratorController();
    }

    public function mount()
    {
        $this->projects = Auth::user()->projects;
        $this->collabs = $this->collaboratorController->get();
    }
    
    public function render()
    {
        return view('livewire.nav-bar');
    }
}
