<?php

namespace App\Livewire;

use App\Http\Controllers\InvitationsController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserSearchBox extends Component
{

    public $users;

    public $projectId;



    public function __construct()
    {

    }

    public function mount(){
        $this->users = User::query()
            ->where('id', '!=', Auth::id())
            ->get();
    }
    public function render()
    {
        return view('livewire.user-search-box');
    }
}
