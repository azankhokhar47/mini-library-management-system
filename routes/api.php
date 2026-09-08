<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoanController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReviewController;


// =========================================================
// API LOGIN
// POST /api/login
// =========================================================

Route::post('/login', [AuthController::class, 'login']);


// =========================================================
// AUTHENTICATED USER
// GET /api/user
// =========================================================

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();

});


// =========================================================
// PUBLIC BOOKS
// =========================================================

// Get all books
// GET /api/books

Route::get('/books', [BookController::class, 'index'])
    ->name('api.books.index');


// Get single book
// GET /api/books/{book}

Route::get('/books/{book}', [BookController::class, 'show'])
    ->name('api.books.show');


// =========================================================
// PUBLIC AUTHORS
// =========================================================

// Get all authors
// GET /api/authors

Route::get('/authors', [AuthorController::class, 'index'])
    ->name('api.authors.index');


// =========================================================
// PUBLIC CATEGORIES
// =========================================================

// Get all categories
// GET /api/categories

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('api.categories.index');


// =========================================================
// AUTHENTICATED API ROUTES
// =========================================================

Route::middleware('auth:sanctum')->group(function () {


    // =====================================================
    // LOANS
    // =====================================================

    // Get logged-in user's loans
    // GET /api/my-loans

    Route::get('/my-loans', [LoanController::class, 'myLoans']);


    // Borrow a book
    // POST /api/books/{book}/borrow

    Route::post(
        '/books/{book}/borrow',
        [LoanController::class, 'borrow']
    );


    // Return a loan
    // POST /api/loans/{loan}/return

    Route::post(
        '/loans/{loan}/return',
        [LoanController::class, 'returnBook']
    );


    // =====================================================
    // REVIEWS
    // =====================================================

    // Create review
    // POST /api/books/{book}/reviews

    Route::post(
        '/books/{book}/reviews',
        [ReviewController::class, 'store']
    );


    // Update review
    // PUT /api/reviews/{review}

    Route::put(
        '/reviews/{review}',
        [ReviewController::class, 'update']
    );


    // Delete review
    // DELETE /api/reviews/{review}

    Route::delete(
        '/reviews/{review}',
        [ReviewController::class, 'destroy']
    );

});
