<?php

use Illuminate\Support\Facades\Route;


use App\Models\Job;



Route::get("/", function () {

    return view('home');
});

Route::get('/jobs', function () {

    //eager load the employer relations at the start of view render to get past the n+1 problem
    $jobs = Job::with('employer')->simplePaginate(3);

    return view('jobs', [
        'greeting' => 'Hello',
        'name' => 'Sid Aulakh',
        'jobs' => $jobs,
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = Job::all();
    $job = Job::find($id);
    return view('job', [
        'job' => $job,
    ]);
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
