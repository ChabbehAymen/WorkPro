<?php

use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\InvitationsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::view('/profile', 'profile')->name('profile');

    Route::get('/home', [ProjectController::class, 'show'])->name('home');
    Route::group(['prefix' => '/project'], function () {
        Route::get('/{id}', [ProjectController::class, 'find'])->name('main');
        Route::post('/create', [ProjectController::class, 'store'])->name('create.project');
        Route::delete('/delete/{id}', [ProjectController::class, 'destroy'])->name('delete.project');
    });

    Route::group(['prefix' => '/project/{project_id}'], function () {
        Route::get('/invite/{user_id}', [InvitationsController::class, 'create'])->name('create.invitation');
        Route::delete('/revoke/{user_id}', [InvitationsController::class, 'delete'])->name('delete.invitation');
        Route::post('/collaborate/{user_id}',[CollaboratorController::class, 'create'])->name('create.collaborator');
        Route::delete('/quite/{user_id}', [CollaboratorController::class,'delete'])->name('delete.collaboration');
        Route::get('/createTask', function (string $id){
            return view('createTask', compact('id'));
        })->name('create.task');
    });
});

require __DIR__ . '/auth.php';
