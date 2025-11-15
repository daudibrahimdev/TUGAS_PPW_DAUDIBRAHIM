<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// routing dashboard (M4)
Route::get('/', function () { 
    return view('home'); 
})->name('home'); 

//route dengan mode resources  
Route::resource('/products', ProductController::class); 

// Admin 
Route::get('/dashboard', function () { 
    return view('dashboard'); 
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');
 
// User 
// Route::get('/', function () { 
//     return view('dashboard'); 
// })->name('home'); 


Route::view('/cek-app-layout', 'layouts.app')->name('test.layout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
