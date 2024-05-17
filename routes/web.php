<?php

use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [UserController::class, 'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
    Route::post('/profile/update/{id}', [UserController::class, 'ProfileUpdate'])->name('update.profile');
    Route::get('/profile/change-password/{id}', [UserController::class, 'ChangePassword'])->name('profile.change.password');
    Route::post('/profile/update-password/{id}', [UserController::class, 'UpdatePassword'])->name('profile.update.password');

    Route::get('/logout', [UserController::class, 'Logout'])->name('profile.logout');

});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
