<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Colobrator;
use App\Models\Project;
use App\Repositories\CollaborationsRepo;
use App\Repositories\ProjectRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProjectController extends Controller
{
    protected CollaborationsRepo $collaborationsRepo;
    protected ProjectRepository $projectsRepo;
    public function __construct()
    {
        $this->projectsRepo = new ProjectRepository(new Project());
        $this->collaborationsRepo = new CollaborationsRepo(new Colobrator());
    }

    public function show(): view
    {
        $userProjects = $this->getUserProjects();
         $collab=$this->getCollaborations();
        return view('home', compact('userProjects', 'collab'));
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
        return view('main', compact('project', 'userProjects', 'collabs', 'collabors'));
    }

    public function destroy(Request $request, $id){
        $this->projectsRepo->delete($id);
        return back();
    }

    public function getUserProjects(): Collection|array
    {
        return $this->projectsRepo->get(Auth::id());
    }


}
