<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            // Admin, Librarian and Member
            // all can access the same dashboard.
            if (in_array($user->role, [
                'admin',
                'librarian',
                'member'
            ])) {
                return redirect()->route('dashboard');
            }

            Auth::logout();

            return back()->withErrors([
                'email' => 'Invalid user role.',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
