<?php

namespace App\Policies;

use App\Models\Loan;
use App\Models\User;

class LoanPolicy
{
    /**
     * View loans list.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            'member',
            'librarian',
            'admin',
        ]);
    }

    /**
     * View a single loan.
     */
    public function view(User $user, Loan $loan): bool
    {
        // Member can only view their own loan
        if ($user->role === 'member') {
            return $loan->user_id === $user->id;
        }

        // Librarian and Admin can view any loan
        return in_array($user->role, [
            'librarian',
            'admin',
        ]);
    }

    /**
     * Return a book.
     */
    public function returnBook(User $user, Loan $loan): bool
    {
        // Member can return only their own loan
        if ($user->role === 'member') {
            return $loan->user_id === $user->id;
        }

        // Librarian and Admin can return any loan
        return in_array($user->role, [
            'librarian',
            'admin',
        ]);
    }
}
