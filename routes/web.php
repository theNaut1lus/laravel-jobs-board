<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Arr;

Route::get("/", function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'greeting' => 'Hello',
        'name' => 'Sid Aulakh',
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Software Engineer',
                'salary' => 100000,
            ],
            [
                'id'=> 2,
                'title' => 'Data Scientist',
                'salary' => 120000,
            ],
            [
                'id'=> 3,
                'title' => 'Product Manager',
                'salary' => 150000,
            ],
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs =[
            [
                'id' => 1,
                'title' => 'Software Engineer',
                'salary' => 100000,
            ],
            [
                'id'=> 2,
                'title' => 'Data Scientist',
                'salary' => 120000,
            ],
            [
                'id'=> 3,
                'title' => 'Product Manager',
                'salary' => 150000,
            ],
        ];

        $job = Arr::first($jobs, fn($job) => $job['id'] == $id);


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
