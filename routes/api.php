<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\AuthorController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Sanctum authenticated user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// ================================
// BOOK API
// ================================

// Public - All books
Route::get('/books', [BookController::class, 'index'])
    ->name('api.books.index');

// Public - Single book
Route::get('/books/{book}', [BookController::class, 'show'])
    ->name('api.books.show');

Route::get('/authors', [AuthorController::class, 'index'])
    ->name('api.authors.index');
