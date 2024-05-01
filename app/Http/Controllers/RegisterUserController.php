<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

       $user = User::create($attributes);

       Auth::login($user);

       return redirect('/jobs')->with('success', 'Account created successfully.');

    }
}
