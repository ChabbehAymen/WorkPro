<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRrepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
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
            return redirect('home')->with('success','Welcome Back');
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
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function edite(Request $request){
        $data = $request->validateWithBag('profile', [
            'profile_img'=>'sometimes|image|mimes:jpeg,png,jpg,gif',
            'user_name'=>'required|min:5',
            'old_password'=>'required',
            'password'=>'sometimes|min:6'
        ]);
        if($data['password'] === '******') unset($data['password']);
        if ($data['profile_img'] && Auth::user()->profile_img === 'unset' && $this->validPassword($data['old_password'])) {
            $photo = $request->file('profile_img');
            $fileName = str_replace(' ', '', Auth::user()->user_name).'profile_img.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('asset/imags'), $fileName);
            $data['profile_img'] = 'asset/imags/' . $fileName;
        }else if($data['profile_img'] && Auth::user()->profile_img !== 'unset' && $this->validPassword($data['old_password'])){
            $photo = $request->file('profile_img');
            $fileName = str_replace(' ', '', Auth::user()->user_name).'profile_img.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('asset/imags'), $fileName);
            $data['profile_img'] = 'asset/imags/' . $fileName;
        }
        if ($this->validPassword($data['old_password'])) {
            $this->repo->update(Auth()->id(), $data);
        }else{
            return back()->with('error', 'Unvalid Password');
        }
        return back()->with('error', 'Succesfuly Updated');
    }

    private function validPassword(string $password){
        return Hash::check($password, Auth::user()->getAuthPassword() );
    }
}
