<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $data = [
            'totalBooks' => Book::count(),

            'totalMembers' => User::where('role', 'member')->count(),

            'currentlyBorrowed' => Loan::whereNull('returned_at')->count(),

            'overdueLoans' => Loan::whereNull('returned_at')
                ->where('due_at', '<', now())
                ->count(),

            'topBorrowedBooks' => Book::withCount('loans')
                ->orderByDesc('loans_count')
                ->take(5)
                ->get(),

            'topRatedBooks' => Book::withAvg('reviews', 'rating')
                ->orderByDesc('reviews_avg_rating')
                ->take(5)
                ->get(),
        ];

        return view('dashboard', compact('user', 'data'));
    }
}
