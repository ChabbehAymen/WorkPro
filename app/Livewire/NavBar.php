<?php

namespace App\Livewire;

use App\Models\Colobrator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavBar extends Component
{
    public  Collection|array $projects = [];
    public  Collection|array $collabs = [];
    public int $selectedID;

    public function mount()
    {
        $this->projects = Auth::user()->projects;
        $this->collabs = Colobrator::query()
            ->join('projects', 'project_id', '=', 'id')
            ->where('colobrators.user_id', '=', Auth::id())
            ->get();
    }
    public function render()
    {
        return view('livewire.nav-bar');
    }
}
