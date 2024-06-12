<?php

namespace App\Http\Controllers;

use App\Models\Invetation;
use App\Models\User;
use App\Repositories\UserRrepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Colobrator;
use App\Models\Project;
use App\Repositories\CollaborationsRepo;
use App\Repositories\InvetationsRepo;
use App\Repositories\ProjectRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProjectController extends Controller
{
    protected CollaborationsRepo $collaborationsRepo;
    protected ProjectRepository $projectsRepo;
    protected InvetationsRepo $invitationsRepo;

    protected $usersRepo;
    public function __construct()
    {
        $this->projectsRepo = new ProjectRepository(new Project());
        $this->collaborationsRepo = new CollaborationsRepo(new Colobrator());
        $this->usersRepo = new UserRrepository(new User());
        $this->invitationsRepo = new InvetationsRepo(new Invetation());
    }

    public function show(): view
    {
        $userProjects = $this->getUserProjects();
         $collaborations=$this->getCollaborations();
        return view('home', compact('userProjects', 'collaborations'));
    }

    public function getCollaborations(): Collection|array{
        return $this->collaborationsRepo->get(Auth::id());
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validateWithBag('projectCreate',['title'=>['bail','required', 'max:50']]);
        $this->projectsRepo->create(['title'=>$data['title'], 'user_id'=>Auth::id()]);
        return back()->with('success', 'Project Created');
    }

    public function find($id)
    {
        $project = $this->projectsRepo->find($id);
        $userProjects = $this->getUserProjects();
        $collabs = $this->getCollaborations();
        $collabors = $this->projectsRepo->getCollaborators($id);
        $projectCreator = $project->user_id === Auth::id()?null:$this->usersRepo->find($project->user_id);
        return view('main', compact('project', 'userProjects', 'collabs', 'collabors', 'projectCreator'));
    }

    public function destroy(Request $request, $id){

        $this->deleteInvitations($id);
        $this->deleteCollabos($id);
        $this->projectsRepo->delete($id);
        return back();
    }

    public function deleteInvitations($projectId){
        $this->invitationsRepo->deleteWithProject($projectId);
    }

    public function deleteCollabos($projectId){
        $this->collaborationsRepo->deleteWithProject($projectId);
    }

    public function getUserProjects(): Collection|array
    {
        return $this->projectsRepo->get(Auth::id());
    }


}
