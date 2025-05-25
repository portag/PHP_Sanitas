<?php

use App\Http\Controllers\centrosController;
use App\Http\Controllers\citasController;
use App\Http\Controllers\noticiasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//en esta pagina, debes estar logueado para ver el contenido, en caso contrario, solo se mostrara el welcome blade
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/usuarios', [ProfileController::class, 'index'])->name('users.index');
    Route::get('/usuarios/rol', [ProfileController::class, 'updateRol']);
    Route::get('/centros', [centrosController::class, 'index'])->name('centros.index');
    Route::get('/noticias', [noticiasController::class, 'index'])->name('noticias.index');
    Route::get('/centros/nuevo', [centrosController::class, 'create']);
    Route::post('/centros/crear', [centrosController::class, 'store']);
    Route::get('/centros/filtro', [centrosController::class, 'indexFiltro']);
    Route::get('/medicos/filtro/{centro}', [centrosController::class, 'filtroMedico']);
    Route::get('/centros/{centro}', [centrosController::class, "show"])->name("centros.show");
    Route::get('/centros/borrar/{centro}', [centrosController::class, "destroy"])->name("centros.destroy");
    Route::get('/centros/noticias/{centro}', [centrosController::class, "showNoticias"])->name("noticias.showNoticias");
    Route::get('/noticias/nueva/{centro}', [noticiasController::class, 'create']);
    Route::get('/noticias/nueva', [noticiasController::class, 'createGeneral']);
    Route::post('/noticias/crear', [noticiasController::class, 'store']);
    Route::get('/centros/{centro}/usuario/{user}', [centrosController::class, 'inscribir']);
    Route::get('/centros/{centro}/usuario/{user}/borrar', [centrosController::class, 'desinscribir']);
    Route::get('/citas/nueva/{centro}', [citasController::class, 'create']);
    Route::post('/citas/crear', [citasController::class, 'store']);
    Route::get('/citas', [citasController::class, 'index']);
    Route::get('/citas/pacientes', [citasController::class, 'citaPacientes']);
    Route::get('/noticias/borrar/{noticia}', [noticiasController::class, "destroy"])->name("noticias.destroy");
    Route::get('/noticias/borrar/{noticia}/centro', [noticiasController::class, "centroDestroy"])->name("noticias.destroy");
    Route::post('/centros/{centro}/medico', [centrosController::class, 'addMedicos'])->name('centros.addMedicos');
});





require __DIR__.'/auth.php';
