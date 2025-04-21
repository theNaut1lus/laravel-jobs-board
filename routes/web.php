<?php

use App\Http\Controllers\JobController;
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

