<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemUserController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('loans', LoanUserController::class);
    Route::resource('items', ItemUserController::class);

    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::resource('loans', LoanController::class);
        Route::resource('users', UserController::class);
        Route::resource('items', ItemController::class);
    });
});

require __DIR__.'/auth.php';
