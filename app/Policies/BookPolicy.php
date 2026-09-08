<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    // View all books
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian',
            'member'
        ]);
    }

    // View a single book
    public function view(User $user, Book $book): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian',
            'member'
        ]);
    }

    // Create book
    public function create(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian'
        ]);
    }

    // Update book
    public function update(User $user, Book $book): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian'
        ]);
    }

    // Delete book
    public function delete(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }
}
