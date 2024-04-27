<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function (){
    return view('authentication');
})->name('auth');

Route::post('/user/login', [UserController::class, 'findUser'])->name('find.user');
Route::post('/user/register', [UserController::class, 'addUser'])->name('add.user');
