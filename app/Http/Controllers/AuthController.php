<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Show the login form
    }

    public function login(Request $request)
    {
        // Validate the login form inputs
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Get the login credentials
        $credentials = $request->only('username', 'password');

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            // Check the user type after successful login
            if (Auth::user()->usertype_id == '1') {
                // If the user is an admin, redirect to the admin dashboard
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->usertype_id == '2') {
                // If the user is an anggota (member), redirect to the anggota dashboard
                return redirect()->route('anggotaa.dashboard');
            } else {
                // If the user type is not valid, log the user out and show an error message
                Auth::logout();
                return redirect()->route('login')->withErrors(['login_failed' => 'User type tidak valid.']);
            }
        } else {
            // If the login fails (invalid credentials), show an error message
            return redirect()->route('login')->withErrors(['login_failed' => 'Invalid credentials.']);
        }
    }

    public function logout()
    {
        // Log the user out
        Auth::logout();

        // Invalidate the session
        request()->session()->invalidate();

        // Regenerate the CSRF token for security
        request()->session()->regenerateToken();

        // Redirect to the login page
        return redirect()->route('login');
    }
}
