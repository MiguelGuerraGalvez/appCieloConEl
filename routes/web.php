<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\HermandadController;
use App\Http\Controllers\ConsejoController;
use App\Http\Controllers\VolverController;
use App\Http\Middleware\CheckRole;

Route::middleware('auth')->group(function () {
    Route::get('/', [VolverController::class, 'index'])->name('volver');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/principal', [PrincipalController::class, 'index'])->name('principal');
    Route::get('/busqueda', [PrincipalController::class, 'buscar']);

    Route::get('/hermandades/{hermandad}', [HermandadController::class, 'show'])->name('hermandad');
    
    Route::get('/consejo', [ConsejoController::class, 'index'])->name('consejo');
    Route::get('/consejo/carteles', [ConsejoController::class, 'carteles'])->name('consejo.carteles');
    Route::get('/consejo/pregones', [ConsejoController::class, 'pregones'])->name('consejo.pregones');
    Route::get('/consejo/itinerarios', [ConsejoController::class, 'itinerarios'])->name('consejo.itinerarios');
    Route::get('/consejo/itinerarios/{itinerario}', [ConsejoController::class, 'show'])->name('consejo.itinerario');
    Route::get('/consejo/titulares/{itinerario}', [ConsejoController::class, 'titulares'])->name('consejo.titulares');
});

Route::middleware(['auth', CheckRole::class.':consejo'])->group(function () {
    Route::get('administracion/consejo', [ConsejoController::class, 'create'])->name('consejo.administracion');
});

Route::middleware(['auth', CheckRole::class.':hermandad'])->group(function () {
    Route::get('administracion/{hermandad}', [HermandadController::class, 'create'])->name('hermandad.administracion');
});


require __DIR__.'/auth.php';
