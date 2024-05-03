<?php

namespace App\Http\Controllers;

use App\Models\Colobrator;
use App\Repositories\CollaborationsRepo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollaboratorController extends Controller
{
    protected CollaborationsRepo $collabsRepo;
    protected InvitationsController $invitationsController;
    public function __construct()
    {
        $this->collabsRepo = new CollaborationsRepo(new Colobrator());
        $this->invitationsController = new InvitationsController();
    }

    public function get()
    {
        return $this->collabsRepo->get(Auth::id());
    }

    public function create($projectId, $userId)
    {
        $this->collabsRepo->create(['user_id'=>$userId, 'project_id'=>$projectId]);
        $this->invitationsController->delete($projectId, $userId);
        return back();
    }

    public function delete($projectId, $userId): RedirectResponse{
        $this->collabsRepo->delete(['user_id'=>$userId, 'project_id'=>$projectId]);
        return back()->with('success', 'Collaborator Have Ben Kicked');
    }
}
