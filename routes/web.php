<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('login');


// Login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');


// Dashboards
Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/librarian/dashboard', function () {
        return view('librarian.dashboard');
    })->name('librarian.dashboard');

    Route::get('/member/dashboard', function () {
        return view('member.dashboard');
    })->name('member.dashboard');

});
