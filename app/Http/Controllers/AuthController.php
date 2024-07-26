<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // Register User
    public function register(Request $request) {
        //validate 
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', "unique:users"],
            'password' => ['required', 'min:3', 'confirmed'],

        ]);

        //register
        $user = User::create($fields);

        //login
        Auth::login($user);


        //redirect
        return redirect()->route("posts.index   ");

    }

    //Login User

    public function login(Request $request) {

        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($fields, $request->remember)) {
            return redirect()->intended('dashboard');
        }else {
            return back()->withErrors(['failed' => 'The provided credentials do not match our records.']);
        }

    }

    //Logout User

    public function logout(Request $request) {

        // Logout the user
        Auth::logout();

        // Invalidate Users Session
        $request->session()->invalidate();

        // Regenerate CSRF Token
        $request->session()->regenerateToken();

        //Redirect to homepage
        return redirect('/');
    }
}
