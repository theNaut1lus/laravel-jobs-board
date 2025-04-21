<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


//base app routes

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');


Route::resource('jobs', JobController::class, [
    'except' => ''
]);

// Route::controller(JobController::class)->group(function () {
//     //job views
//     Route::get('/jobs', 'index'); //show all jobs
//     Route::get('/jobs/create', 'create'); //create a job
//     Route::get('/jobs/{job}', 'show'); //Show a job
//     Route::get('/jobs/{job}/edit', 'edit'); //Edit View

//     //Job CRUD
//     Route::post('/jobs', 'store'); //store Job
//     Route::patch('/jobs/{job}', 'update'); //Update Job
//     Route::delete('/jobs/{job}', 'destroy'); //Delete Job
// });

//Auth

//register
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

//login
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);