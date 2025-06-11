<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\HermandadController;
use App\Http\Controllers\ConsejoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VolverController;
use App\Http\Middleware\CheckRole;

Route::middleware('auth')->group(function () {
    Route::get('/', [VolverController::class, 'index'])->name('volver');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/principal', [PrincipalController::class, 'index'])->name('principal');
    Route::get('/busqueda', [PrincipalController::class, 'buscar']);
    Route::get('modificarUsuario', [PrincipalController::class, 'modificarUsuario'])->name('principal.modificarUsuario');
    Route::post('updateUsuario', [PrincipalController::class, 'updateUsuario'])->name('principal.updateUsuario');

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
    Route::post('administracion/aceptarItinerario', [ConsejoController::class, 'aceptarItinerario'])->name('consejo.aceptarItinerario');
    Route::post('administracion/declinarItinerario', [ConsejoController::class, 'declinarItinerario'])->name('consejo.declinarItinerario');
    Route::post('administracion/aceptarHermandad', [ConsejoController::class, 'aceptarHermandad'])->name('consejo.aceptarHermandad');
    Route::post('administracion/declinarHermandad', [ConsejoController::class, 'declinarHermandad'])->name('consejo.declinarHermandad');
    Route::post('administracion/confirmarEliminarCarteles', [ConsejoController::class, 'confirmarEliminarCarteles'])->name('consejo.confirmarEliminarCarteles');
    Route::post('administracion/deleteCarteles', [ConsejoController::class, 'deleteCarteles'])->name('consejo.deleteCarteles');
    Route::post('administracion/modificarCarteles', [ConsejoController::class, 'modificarCarteles'])->name('consejo.modificarCarteles');
    Route::post('administracion/updateCarteles', [ConsejoController::class, 'updateCarteles'])->name('consejo.updateCarteles');
    Route::post('administracion/insertarCarteles', [ConsejoController::class, 'insertarCarteles'])->name('consejo.insertarCarteles');
    Route::post('administracion/confirmarEliminarPregones', [ConsejoController::class, 'confirmarEliminarPregones'])->name('consejo.confirmarEliminarPregones');
    Route::post('administracion/deletePregones', [ConsejoController::class, 'deletePregones'])->name('consejo.deletePregones');
    Route::post('administracion/modificarPregones', [ConsejoController::class, 'modificarPregones'])->name('consejo.modificarPregones');
    Route::post('administracion/updatePregones', [ConsejoController::class, 'updatePregones'])->name('consejo.updatePregones');
    Route::post('administracion/insertarPregones', [ConsejoController::class, 'insertarPregones'])->name('consejo.insertarPregones');
});

Route::middleware(['auth', CheckRole::class.':hermandad'])->group(function () {
    Route::get('administracion/{hermandad}', [HermandadController::class, 'create'])->name('hermandad.administracion');
    Route::post('administracion/nuevoItinerario', [HermandadController::class, 'nuevoItinerario'])->name('hermandad.nuevoItinerario');
    Route::post('administracion/confirmarEliminarItinerario', [HermandadController::class, 'confirmarEliminarItinerario'])->name('hermandad.confirmarEliminarItinerario');
    Route::post('administracion/deleteItinerario', [HermandadController::class, 'deleteItinerario'])->name('hermandad.deleteItinerario');
    Route::post('administracion/contratarBanda', [HermandadController::class, 'contratarBanda'])->name('hermandad.contratarBanda');
    Route::post('administracion/gestionHermanos', [HermandadController::class, 'gestionHermanos'])->name('hermandad.gestionHermanos');
    Route::post('administracion/gestionCuota', [HermandadController::class, 'gestionCuota'])->name('hermandad.gestionCuota');
    Route::post('administracion/cambiarFotos', [HermandadController::class, 'cambiarFotos'])->name('hermandad.cambiarFotos');
});


require __DIR__.'/auth.php';
