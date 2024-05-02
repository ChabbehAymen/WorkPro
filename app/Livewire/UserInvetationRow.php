<?php

namespace App\Livewire;

use App\Http\Controllers\InvitationsController;
use Livewire\Component;

class UserInvetationRow extends Component
{

    public $userName;
    public $profileImg;
    public $userId;

    public $projectId;

    public int $isInvited = 0;

    private InvitationsController $invitationsController;


    public function __construct()
    {
        $this->invitationsController = new InvitationsController();
    }

    public function mount()
    {
        $invitation = $this->invitationsController->find($this->userId, $this->projectId);
        if (sizeof($invitation)>0) $this->isInvited = 1;
    }

    public function render()
    {
        return view('livewire.user-invetation-row');
    }
}
