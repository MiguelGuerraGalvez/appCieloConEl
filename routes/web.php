<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\HermandadController;
use App\Http\Controllers\ConsejoController;
use App\Http\Controllers\HomeController;

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/principal', [PrincipalController::class, 'index'])->name('principal');
    Route::get('/hermandades/{hermandad}', [HermandadController::class, 'show'])->name('hermandad');
    Route::get('/consejo', [ConsejoController::class, 'index'])->name('consejo');
    Route::get('/consejo/carteles', [ConsejoController::class, 'carteles'])->name('consejo.carteles');
    Route::get('/consejo/itinerarios', [ConsejoController::class, 'itinerarios'])->name('consejo.itinerarios');
    Route::get('/consejo/pregones', [ConsejoController::class, 'pregones'])->name('consejo.pregones');
});

require __DIR__.'/auth.php';
