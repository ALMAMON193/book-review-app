<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;



Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

   
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['verified'])->name('dashboard');


    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    //             ->name('logout');
});


//Book related route
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/book/view', [BookController::class, 'index'])->name('book.index');
 Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book/store', [BookController::class, 'store'])->name('store');
    Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('edit');
    Route::get('/book', [BookController::class, 'edit'])->name('edit');
    Route::patch('/book', [BookController::class, 'update'])->name('update');
    Route::delete('/book', [BookController::class, 'destroy'])->name('destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
