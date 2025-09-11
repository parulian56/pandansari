<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard hanya bisa diakses user login + verified
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua route di bawah ini butuh login
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Masyarakat
    Route::resource('masyarakat', MasyarakatController::class);

    // CRUD Calon
    Route::resource('calon', CalonController::class);

    // Voting routes
    Route::prefix('voting')->name('voting.')->group(function () {
        Route::get('/', [VotingController::class, 'index'])->name('index'); // tampilkan calon untuk dicoblos
        Route::post('/{calon}', [VotingController::class, 'vote'])->name('vote'); // aksi coblos
    });
});

require __DIR__.'/auth.php';
