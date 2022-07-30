<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // REGISTER FORM
    public function register() {
        return view('users.register');
    }

    // NEW USER
    public function store(Request $request) {
        $formFields = $request->validate([
           'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:5'
        ]);
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        auth()->login($user);
        return redirect('/')->with('message', 'Successfully registered');
    }

    // LOGOUT USER
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out successfully');
    }

    // LOGIN FORM
    public function login() {
        return view('users.login');
    }

    // LOGIN USER
    public function loggingin(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Logged in successfully');
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}
