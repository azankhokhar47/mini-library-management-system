<?php

namespace App\Policies;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LoanPolicy
{

    public function view(User $user, Loan $loan)
    {

        if ($user->role === 'member') {
            return $loan->user_id === $user->id;
        }
        return in_array($user->role, ['librarian', 'admin']);
    }
}
