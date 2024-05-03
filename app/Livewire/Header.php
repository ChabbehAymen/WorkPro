<?php

namespace App\Livewire;

use App\Http\Controllers\InvitationsController;
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

    private InvitationsController $invitationsController;

    public function __construct()
    {
        $this->invitationsController = new InvitationsController();
    }

    public function mount()
    {
        if ($this->withProfile!== null) $this->user = Auth::user();
        $this->notifications = $this->invitationsController->get();
    }
    public function render()
    {
        return view('livewire.header');
    }
}
