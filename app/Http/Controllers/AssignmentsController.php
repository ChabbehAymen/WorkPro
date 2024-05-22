<?php
namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Colobrator;
use App\Repositories\AssignmentRepository;
use App\Repositories\CollaborationsRepo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentsController extends Controller
{
    protected $repo;
    public function __construct()
    {
        $this->repo = new AssignmentRepository(new Assignment());
    }

    public function get($task_id){
        return $this->repo->get($task_id);
    }

}
