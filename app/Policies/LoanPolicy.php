<?php
namespace App\Policies;

use App\Models\Loan;
use App\Models\User;

class LoanPolicy
{
    // =========================================================
    // VIEW LOANS LIST
    // =========================================================

    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            'member',
            'librarian',
            'admin'
        ]);
    }


    // =========================================================
    // VIEW SINGLE LOAN
    // =========================================================

    public function view(User $user, Loan $loan): bool
    {
        // Member can only view their own loan
        if ($user->role === 'member') {

            return $loan->user_id === $user->id;
        }

        // Librarian and Admin can view any loan
        return in_array($user->role, [
            'librarian',
            'admin'
        ]);
    }


    // =========================================================
    // RETURN BOOK
    // =========================================================

    public function returnBook(User $user, Loan $loan): bool
    {
        // Member can return only their own loan
        if ($user->role === 'member') {

            return $loan->user_id === $user->id;
        }

        // Librarian and Admin can return any loan
        return in_array($user->role, [
            'librarian',
            'admin'
        ]);
    }
}
