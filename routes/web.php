<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


//base app routes
Route::get("/", function () {

    return view('home');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


//job routes

//show all jobs
Route::get('/jobs', [JobController::class, 'index']);

//create a job
Route::get('/jobs/create', [JobController::class, 'create']);

//Show a job
//used model binding to get the exact model needed by referncing the type in the action function
Route::get('/jobs/{job}', [JobController::class, 'show']);

//Edit View
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);


//Job CRUD

//store Job
Route::post('/jobs', [JobController::class, 'store']);


//Update Job
//Model binding now in effect
Route::patch('/jobs/{job}', [JobController::class, 'update']);

//Delete Job
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);