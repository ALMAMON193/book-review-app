<?php

use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front-end.master');
});

Route::get('/dashboard', [UserController::class, 'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
    Route::post('/profile/update/{id}', [UserController::class, 'ProfileUpdate'])->name('update.profile');
    Route::get('/profile/change-password/{id}', [UserController::class, 'ChangePassword'])->name('profile.change.password');
    Route::post('/profile/update-password/{id}', [UserController::class, 'UpdatePassword'])->name('profile.update.password');

    Route::get('/logout', [UserController::class, 'Logout'])->name('profile.logout');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
