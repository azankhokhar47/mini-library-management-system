<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;

class AuthorPolicy
{
    // View authors
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian',
            'member'
        ]);
    }

    // View single author
    public function view(User $user, Author $author): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian',
            'member'
        ]);
    }

    // Create author
    public function create(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian'
        ]);
    }

    // Update author
    public function update(User $user, Author $author): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian'
        ]);
    }

    // Delete author
    public function delete(User $user, Author $author): bool
    {
        return $user->role === 'admin';
    }
}
