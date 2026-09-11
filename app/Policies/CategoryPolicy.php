<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    // View categories
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian',
            'member'
        ]);
    }

    // View single category
    public function view(User $user, Category $category): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian',
            'member'
        ]);
    }

    // Create category
    public function create(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian'
        ]);
    }

    // Update category
    public function update(User $user, Category $category): bool
    {
        return in_array($user->role, [
            'admin',
            'librarian'
        ]);
    }

    // Delete category
    public function delete(User $user, Category $category): bool
    {
        return $user->role === 'admin';
    }
}
