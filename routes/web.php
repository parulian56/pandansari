<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\VotingController; // ✅ tambahin
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Masyarakat
    Route::resource('masyarakat', MasyarakatController::class);

    // CRUD Calon
    Route::resource('calon', CalonController::class);

    // Halaman coblos (voting) ✅
    Route::get('/coblos', [VotingController::class, 'index'])->name('coblos.index');
    Route::post('/coblos/{calon}', [VotingController::class, 'vote'])->name('coblos.vote');
});

require __DIR__.'/auth.php';
