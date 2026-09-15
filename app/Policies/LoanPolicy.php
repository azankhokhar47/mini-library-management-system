<?php

namespace App\Policies;

use App\Models\Loan;
use App\Models\User;

class LoanPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian',
            'member',
        ]);
    }

    public function view(User $user, Loan $loan): bool
    {
        if (in_array($user->role, ['admin', 'librarian'])) {
            return true;
        }

        return $loan->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian',
        ]);
    }

    public function update(User $user, Loan $loan): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian',
        ]);
    }

    public function returnBook(User $user, Loan $loan): bool
    {
        if (in_array($user->role, ['admin', 'librarian'])) {
            return true;
        }

        return $loan->user_id === $user->id;
    }
}
