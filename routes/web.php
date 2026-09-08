<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


// ================================
// LOGIN PAGE
// ================================

Route::get('/', function () {
    return view('welcome');
})->name('login');


// ================================
// LOGIN SUBMIT
// ================================

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');


// ================================
// LOGOUT
// ================================

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


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

    Route::get('/books/create', [BookController::class, 'create'])
        ->name('books.create');

    Route::post('/books', [BookController::class, 'store'])
        ->name('books.store');

    Route::get('/books/{book}/edit', [BookController::class, 'edit'])
        ->name('books.edit');

    Route::put('/books/{book}', [BookController::class, 'update'])
        ->name('books.update');

    Route::delete('/books/{book}', [BookController::class, 'destroy'])
        ->name('books.destroy');


    // // ================================
    // // AUTHORS
    // // ================================

    Route::get('/authors', [AuthorController::class, 'index'])
    ->name('authors.index');

Route::get('/authors/create', [AuthorController::class, 'create'])
    ->name('authors.create');

Route::post('/authors', [AuthorController::class, 'store'])
    ->name('authors.store');

Route::get('/authors/{author}/edit', [AuthorController::class, 'edit'])
    ->name('authors.edit');

Route::put('/authors/{author}', [AuthorController::class, 'update'])
    ->name('authors.update');

Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])
    ->name('authors.destroy');

    // ================================
    // LOANS
    // ================================

    Route::get('/loans', [LoanController::class, 'index'])
        ->name('loans.index');

    Route::get('/loans/{loan}', [LoanController::class, 'show'])
        ->name('loans.show');

    Route::post('/books/{book}/borrow', [LoanController::class, 'borrow'])
        ->name('books.borrow');

    Route::post('/loans/{loan}/return', [LoanController::class, 'return'])
        ->name('loans.return');


    // ================================
    // REVIEWS
    // ================================

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


        // ================================
// USERS
// ================================

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');

    // ================================
    // REPORTING
    // ================================

    Route::get('/reporting', [ReportingController::class, 'index'])
        ->middleware('can:manage-library')
        ->name('reporting.index');


        // ================================
// CATEGORIES
// ================================

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
});
