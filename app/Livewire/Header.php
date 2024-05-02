<?php

namespace App\Livewire;

use App\Models\Invetation;
use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use mysql_xdevapi\Session;

class Header extends Component
{

    public $addIcon;
    public $withProfile;

    public $user;

    public $notifications;

    public function mount()
    {
        if ($this->withProfile!== null) $this->user = Auth::user();
        $this->notifications = Invetation::query()
            ->select('users.id As user_id','user_name', 'profile_img', 'projects.id', 'title')
            ->join('users', 'sender_id', '=', 'users.id')
            ->join('projects', 'project_id', '=', 'projects.id')
            ->where('receiver_id', '=', Auth::id())
            ->get();
    }
    public function render()
    {
        return view('livewire.header');
    }
}
