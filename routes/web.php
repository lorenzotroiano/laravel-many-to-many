<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProjectController;


Route::get('/', [ProjectController::class, 'index'])->name('welcome');

Route::get('/create', [ProjectController::class, 'create'])
    ->middleware(['auth'])
    ->name('project.create');
Route::post('/store', [ProjectController::class, 'store'])
    ->middleware(['auth'])
    ->name('project.store');

Route::get('/show/{id}', [ProjectController::class, 'show'])->middleware(['auth'])->name('project.show');

// ->middleware(['auth', 'verified'])

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__ . '/auth.php';
