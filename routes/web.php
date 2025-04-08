<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SSOController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

// SSO Routes
Route::get('/auth/{provider}/redirect', [SSOController::class, 'redirect'])->name('sso.redirect');
Route::get('/auth/{provider}/callback', [SSOController::class, 'callback'])->name('sso.callback');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
