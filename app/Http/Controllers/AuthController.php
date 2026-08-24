<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role === 'librarian') {
                return redirect()->route('librarian.dashboard');
            }

            return redirect()->route('member.dashboard');
        }

        return back()->withErrors([
            'email' => 'The email or password is incorrect.',
        ])->withInput();
    }
}
