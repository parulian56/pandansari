<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\ResultController; // tambahin kalau dipakai
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/add-calon', function () {
    return view('add-calon');
})->middleware(['auth', 'verified'])->name('add-calon');

Route::get('/add-people', function () {
    return view('add-people');
})->middleware(['auth', 'verified'])->name('add-people');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Masyarakat
    Route::resource('masyarakat', MasyarakatController::class);

    // CRUD Calon ✅
    Route::resource('calon', CalonController::class);

    // Result
    Route::get('/result', [ResultController::class, 'index'])->name('result.index');
});

require __DIR__.'/auth.php';
