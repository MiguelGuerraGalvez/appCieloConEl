<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\HermandadController;
use App\Http\Controllers\ConsejoController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/principal', [PrincipalController::class, 'index']);
    Route::get('/hermandades/{hermandad}', [HermandadController::class, 'show']);
    Route::get('/consejo', [ConsejoController::class, 'index']);
    Route::get('/consejo/carteles', [ConsejoController::class, 'carteles']);
    Route::get('/consejo/itinerarios', [ConsejoController::class, 'itinerarios']);
    Route::get('/consejo/pregones', [ConsejoController::class, 'pregones']);
});

require __DIR__.'/auth.php';
