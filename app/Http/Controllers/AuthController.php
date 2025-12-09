<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the sign up form
     */
    public function showSignUp()
    {
        return view('auth.signup');
    }

    /**
     * Show the sign in form
     */
    public function showSignIn()
    {
        return view('auth.signin');
    }

    /**
     * Handle user registration
     */
    public function signUp(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'age' => 'required|integer|min:0|max:200',
            'gender' => 'required|in:M,F',
        ]);

        // Set profile image based on gender
        $image = $request->gender === 'F' ? 'F.png' : 'M.png';

        // Create the user
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'gender' => $request->gender,
            'image' => $image,
            'type' => 'user',
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to home page
        return redirect()->route('home')->with('success', 'Have a nice watch :)');
    }

    /**
     * Handle user login
     */
    public function signIn(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('signin');
    }
}
