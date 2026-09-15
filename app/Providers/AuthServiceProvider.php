<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Review;
use App\Models\Author;
use App\Models\Category;

use App\Policies\UserPolicy;
use App\Policies\BookPolicy;
use App\Policies\LoanPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\AuthorPolicy;
use App\Policies\CategoryPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Book::class => BookPolicy::class,
        Loan::class => LoanPolicy::class,
        Review::class => ReviewPolicy::class,
        Author::class => AuthorPolicy::class,
        Category::class => CategoryPolicy::class,
    ];

    public function boot()
    {
        Gate::define('access-admin-dashboard', function (User $user) {
            return in_array($user->role, [
                'admin',
                'librarian',
                'member'
            ]);
        });

        Gate::define('manage-library', function (User $user) {
            return in_array($user->role, [
                'librarian',
                'admin'
            ]);
        });
    }
}
