<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


//base app routes

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

//Using resource does shrten our controller, but then we apply middleware to all routes ort we have tp use only/except.
// Route::resource('jobs', JobController::class, [
//     'except' => ''
// ])->middleware('auth');

//We are bringing back the controller group so that we can apply midsdleware to whichever route we really need.
Route::controller(JobController::class)->group(function () {
    //job views
    Route::get('/jobs', 'index'); //show all jobs
    Route::get('/jobs/create', 'create'); //create a job
    Route::get('/jobs/{job}', 'show'); //Show a job
    Route::get('/jobs/{job}/edit', 'edit')
        ->middleware('auth')
        ->can('edit', 'job'); //Edit View

    //Job CRUD
    Route::post('/jobs', 'store')->middleware('auth'); //store Job
    Route::patch('/jobs/{job}', 'update')
        ->middleware('auth')
        ->can('edit', 'job'); //Update Job
    Route::delete('/jobs/{job}', 'destroy')
        ->middleware('auth')
        ->can('edit', 'job'); //Delete Job
});

//Auth

//register
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

//login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);