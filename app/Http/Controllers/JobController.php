<?php

namespace App\Http\Controllers;

use App\Models\Job;

use Illuminate\Http\Request;

class JobController extends Controller
{

    //view controllers
    public function index()
    {
        //eager load the employer relations at the start of view render to get past the n+1 problem
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'greeting' => 'Hello',
            'name' => 'Sid Aulakh',
            'jobs' => $jobs,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        // $jobs = Job::all();
        // $job = Job::find($id);

        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job' => $job,
        ]);
    }

    //CRUD controllers

    public function store()
    {

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
    }



    public function update(Job $job)
    {
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
    }

    public function destroy(Job $job)
    {
        //authorise ON-HOLD

        // Job::findOrFail($id)->delete();

        $job->delete();

        return redirect('/jobs');
    }

}
