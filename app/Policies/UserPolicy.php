<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * View users.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * View a single user.
     */
    public function view(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Update user.
     */
    public function update(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Delete user.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }
}
