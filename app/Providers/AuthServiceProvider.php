<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Review;

use App\Policies\BookPolicy;
use App\Policies\LoanPolicy;
use App\Policies\ReviewPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Book::class => BookPolicy::class,
        Loan::class => LoanPolicy::class,
        Review::class => ReviewPolicy::class,
    ];

    public function boot()
    {
        Gate::define('access-admin-dashboard', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('manage-library', function (User $user) {
            return in_array($user->role, ['librarian', 'admin']);
        });
    }
}
