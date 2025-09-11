<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard hanya bisa diakses user login + verified
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/add-people', function () {
    return view('add-people');
})->middleware(['auth', 'verified'])->name('add-people');

Route::get('/add-calon', function () {
    return view('add-calon');
})->middleware(['auth', 'verified'])->name('add-calon');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Masyarakat
    Route::resource('masyarakat', MasyarakatController::class);

    // CRUD Calon
    Route::resource('calon', CalonController::class);

    // Voting
    Route::get('/coblos', [VotingController::class, 'index'])->name('coblos.index');
    Route::post('/coblos/{calon}', [VotingController::class, 'vote'])->name('coblos.vote');

    // Hasil
    Route::get('/result', [ResultController::class, 'index'])->name('result');
});

require __DIR__.'/auth.php';
