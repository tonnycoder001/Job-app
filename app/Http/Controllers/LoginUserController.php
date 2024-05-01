<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store()
    {
       $attributes = request()->validate([
            'email' => ['required', 'email' ],
            'password' => ['required']
        ]);
        Auth::attempt($attributes); // attempt to authenticate the user

        // request()->session()->regenerate(); // regenerate the session id
        if (Auth::check()) {
            return redirect('/');
        }

        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
