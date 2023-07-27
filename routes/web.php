<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProjectController;


// Rotta per visualizzare l'elenco di tutti i progetti
Route::get('/', [ProjectController::class, 'index'])->name('welcome');

// Rotta per mostrare il form di creazione di un nuovo progetto
Route::get('/create', [ProjectController::class, 'create'])
    ->middleware(['auth']) // Middleware per assicurarsi che l'utente sia autenticato
    ->name('project.create');

// Rotta per salvare un nuovo progetto nel database
Route::post('/store', [ProjectController::class, 'store'])
    ->middleware(['auth'])
    ->name('project.store');

// Rotta per mostrare i dettagli di un progetto specifico
Route::get('/show/{id}', [ProjectController::class, 'show'])
    ->middleware(['auth'])
    ->name('project.show');

// Rotta per mostrare il form di modifica di un progetto esistente
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])
    ->middleware(['auth'])
    ->name('project.edit');

// Rotta per aggiornare un progetto esistente nel database
Route::put('/project/{id}', [ProjectController::class, 'update'])
    ->middleware(['auth'])
    ->name('project.update');

// Rotta per eliminare un progetto dal database
Route::delete('/project/{id}', [ProjectController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('project.destroy');


Route::delete('/project/{id}/picture', [ProjectController::class, 'deletePicture'])
    ->name('project.picture.delete');

// ->middleware(['auth', 'verified'])

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__ . '/auth.php';
