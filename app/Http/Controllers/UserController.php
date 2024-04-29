<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRrepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $repo;
    public function __construct(){
        $this->repo = new UserRrepository(new User);
    }
    public function findUser(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials))
            return redirect('main')->with('success','Signed In');
        return back()->with('success','Login details are not valid');
    }

    public function addUser(Request $request)
    {
        $data = $request->validateWithBag('registration',[
            'user_name'=>['bail','required','unique:users','max:30'],
            'email'=>['bail','required','unique:users','max:50'],
            'password'=>['required','max:30']
        ]);
        $this->repo->create($data);
        return back()->with('success', 'User Created Now Tray to Login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('auth');
    }
}
