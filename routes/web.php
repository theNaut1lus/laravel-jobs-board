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

//Create Job
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

//Show a job
//used model binding to get the exact model needed by referncing the type in the action function
Route::get('/jobs/{job}', function (Job $job) {
    // $jobs = Job::all();
    // $job = Job::find($id);

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

//Edit View
Route::get('/jobs/{id}/edit', function ($id) {
    $jobs = Job::all();
    $job = Job::find($id);
    return view('jobs.edit', [
        'job' => $job,
    ]);
});

//Update Job
//Model binding now in effect
Route::patch('/jobs/{job}', function (Job $job) {
    //authorize TODO

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);



    //$job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);
});

//Delete Job
Route::delete('/jobs/{job}', function (Job $job) {
    //authorise ON-HOLD

    // Job::findOrFail($id)->delete();

    $job->delete();

    return redirect('/jobs');
});