<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;


// ================================
// LOGIN
// ================================

Route::get('/', function () {
    return view('welcome');
})->name('login');


// Login Submit

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');


// ================================
// AUTHENTICATED ROUTES
// ================================

Route::middleware('auth')->group(function () {


    // ================================
    // ADMIN DASHBOARD
    // ================================

    Route::get('/admin/dashboard', function () {

        Gate::authorize('access-admin-dashboard');

        return view('admin.dashboard');

    })->name('admin.dashboard');


    // ================================
    // LIBRARIAN DASHBOARD
    // ================================

    Route::get('/librarian/dashboard', function () {

        Gate::authorize('manage-library');

        return view('librarian.dashboard');

    })->name('librarian.dashboard');


    // ================================
    // MEMBER DASHBOARD
    // ================================

    Route::get('/member/dashboard', function () {

        if (auth()->user()->role !== 'member') {
            abort(403);
        }

        return view('member.dashboard');

    })->name('member.dashboard');


    // ================================
    // BOOKS
    // ================================

    Route::get('/books', [BookController::class, 'index'])
        ->name('books.index');


    // ================================
    // LOANS
    // ================================

    Route::get('/loans', [LoanController::class, 'index'])
        ->name('loans.index');


    Route::get('/loans/{loan}', [LoanController::class, 'show'])
        ->name('loans.show');


    Route::post('/books/{book}/borrow', [LoanController::class, 'borrow'])
        ->name('books.borrow');


    Route::post('/loans/{loan}/return', [LoanController::class, 'returnBook'])
        ->name('loans.return');


    // ================================
    // REVIEWS
    // ================================

    Route::get('/reviews', [ReviewController::class, 'index'])
        ->name('reviews.index');


    Route::get('/reviews/create', [ReviewController::class, 'create'])
        ->name('reviews.create');


    Route::post('/reviews', [ReviewController::class, 'store'])
        ->name('reviews.store');


    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])
        ->name('reviews.edit');


    Route::put('/reviews/{review}', [ReviewController::class, 'update'])
        ->name('reviews.update');


    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])
        ->name('reviews.destroy');

});
