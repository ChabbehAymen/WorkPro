<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function findUser(Request $request)
    {
        return "Login in ....";
    }
    
    public function addUser(Request $request)
    {
        return "adding user ...";
    }
}
