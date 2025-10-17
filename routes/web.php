<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Admin 
Route::get('/dashboard', function () { 
    return view('dashboard'); 
})->middleware(['auth', 'verified', 'admin'])->name('dashboard'); 
 
// User 
Route::get('/', function () { 
    return view('dashboard'); 
})->name('home'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
