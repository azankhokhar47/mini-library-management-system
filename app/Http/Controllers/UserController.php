<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show users.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $users = User::orderBy('name')
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Update user role.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validate([
            'role' => [
                'required',
                'in:admin,librarian,member',
            ],
        ]);

        $user->update([
            'role' => $validated['role'],
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User role updated successfully.');
    }
}
