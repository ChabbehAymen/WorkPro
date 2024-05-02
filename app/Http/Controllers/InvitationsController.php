<?php

namespace App\Http\Controllers;

use App\Models\Invetation;
use App\Repositories\InvetationsRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationsController extends Controller
{
    protected $invetationsRepo;
    public function __construct() {
        $this->invetationsRepo = new InvetationsRepo(new Invetation());
    }

    public function create($project_id, $user_id){
        $this->invetationsRepo->create(['sender_id'=>Auth::id(),'project_id'=>$project_id, 'receiver_id'=>$user_id]);
        return back()->with('success', 'Invitation Sent');
    }

    public function find($userId, $projectId)
    {
        return $this->invetationsRepo->find(['user_id'=>$userId, 'project_id'=>$projectId]);
    }

    public function delete($projectId, $userId){
        $this->invetationsRepo->delete(['user_id'=>$userId, 'project_id'=>$projectId]);
        return back()->with('success', 'Invitation Canceled');
    }
}
