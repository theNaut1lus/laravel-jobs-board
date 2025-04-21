<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        $validatedAttributes = request()->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', Password::min(6), 'confirmed'],
        ]);

        $user = User::create($validatedAttributes);

        //log in wth the new user
        Auth::login($user);

        //redirect somewhere
        return redirect('/jobs');
    }
}
