<?php

use Illuminate\Support\Facades\Route;


use App\Models\Job;



Route::get("/", function () {

    return view('home');
});

Route::get('/jobs', function () {

    //eager load the employer relations at the start of view render to get past the n+1 problem
    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        'greeting' => 'Hello',
        'name' => 'Sid Aulakh',
        'jobs' => $jobs,
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {

    //if these fail, laravel redirects back to the source with an erros variable, which we can display.
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
    ;
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = Job::all();
    $job = Job::find($id);
    return view('jobs.show', [
        'job' => $job,
    ]);
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
