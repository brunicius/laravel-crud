<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/**
 * Rotas de notas
 */
Route::get('notas', [NotaController::class, 'index'])->name('notas.list');
Route::get('notas/create', [NotaController::class, 'create'])->name('notas.create');
Route::post('notas/create', [NotaController::class, 'store'])->name('notas.create.post');
Route::get('notas/edit/{id}', [NotaController::class, 'show'])->name('notas.edit');
Route::post('notas/edit/{id}', [NotaController::class, 'update'])->name('notas.edit.post');
Route::get('notas/delete/{id}', [NotaController::class, 'destroy'])->name('notas.destroy.post');

/**
 * Rotas de usuários
 */
Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.list');

require __DIR__ . '/auth.php';