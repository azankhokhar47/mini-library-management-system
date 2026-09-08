<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    // =========================================================
    // CREATE REVIEW
    // =========================================================

    // Any authenticated user can create a review
    public function create(User $user): bool
    {
        return true;
    }


    // =========================================================
    // UPDATE REVIEW
    // =========================================================

    // User can update only their own review
    public function update(User $user, Review $review): bool
    {
        return $review->user_id === $user->id;
    }


    // =========================================================
    // DELETE REVIEW
    // =========================================================

    // Owner can delete own review
    // Admin can delete any review
    public function delete(User $user, Review $review): bool
    {
        if ($user->role === 'admin') {

            return true;
        }

        return $review->user_id === $user->id;
    }
}
