<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Loan;
use App\Models\Review;

class ReportingController extends Controller
{
    public function index()
    {
        // Total books
        $totalBooks = Book::count();

        // Total members
        $totalMembers = User::where('role', 'member')->count();

        // Books currently borrowed
        $booksCurrentlyBorrowed = Loan::whereNull('returned_at')->count();

        // Overdue loans
        $overdueLoans = Loan::whereNull('returned_at')
            ->where('due_at', '<', now())
            ->count();

        // Top 5 most borrowed books
        $topBorrowedBooks = Book::withCount('loans')
            ->orderByDesc('loans_count')
            ->take(5)
            ->get();

        // Top 5 highest rated books
        $topRatedBooks = Book::withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->having('reviews_count', '>', 0)
            ->orderByDesc('reviews_avg_rating')
            ->take(5)
            ->get();

        return view('reporting.index', compact(
            'totalBooks',
            'totalMembers',
            'booksCurrentlyBorrowed',
            'overdueLoans',
            'topBorrowedBooks',
            'topRatedBooks'
        ));
    }
}
