<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoanController;
use App\Http\Controllers\Api\AuthController;


// ==========================================
// API LOGIN
// POST /api/login
// ==========================================

Route::post('/login', [AuthController::class, 'login']);


// ==========================================
// AUTHENTICATED USER
// GET /api/user
// ==========================================

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// ==========================================
// BOOKS
// ==========================================

Route::get('/books', [BookController::class, 'index'])
    ->name('api.books.index');

Route::get('/books/{book}', [BookController::class, 'show'])
    ->name('api.books.show');


// ==========================================
// AUTHORS
// ==========================================

Route::get('/authors', [AuthorController::class, 'index'])
    ->name('api.authors.index');


// ==========================================
// CATEGORIES
// ==========================================

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('api.categories.index');


// ==========================================
// AUTHENTICATED LOAN ROUTES
// ==========================================

Route::middleware('auth:sanctum')->group(function () {

    // My loan history
    Route::get('/my-loans', [LoanController::class, 'myLoans']);

    // Borrow a book
    Route::post('/books/{book}/borrow', [LoanController::class, 'borrow']);

    // Return a book
    Route::post('/loans/{loan}/return', [LoanController::class, 'returnBook']);
});
