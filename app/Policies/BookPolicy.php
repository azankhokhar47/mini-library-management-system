<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    public function view(User $user, Book $book)
    {
        return true;
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'librarian']);
    }

    public function update(User $user, Book $book)
    {
        return in_array($user->role, ['admin', 'librarian']);
    }

    public function delete(User $user, Book $book)
    {
        return $user->role === 'admin';
    }
}
