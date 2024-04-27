<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRrepository;

class UserController extends Controller
{
    protected $repo;
    public function __construct(){
        $this->repo = new UserRrepository(new User);
    }
    public function findUser(Request $request)
    {
        return "Login in ....";
    }
    
    public function addUser(Request $request)
    {
        $data = $request->validate([
            'user_name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'profile_img'=>'unset'
        ]);
        $this->repo->create($data);
        return back()->with('success', 'User Created Now Tray to Login');
    }
}
