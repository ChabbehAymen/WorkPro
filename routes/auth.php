<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
     });
    Route::view('/auth', 'authentication')->name('auth');
    Route::post('/register', [UserController::class, 'addUser'])->name('register');
    Route::post('/login', [UserController::class, 'findUser'])->name('login');
    Route::get('/login', function (){
        return view('authentication');
    });
});
