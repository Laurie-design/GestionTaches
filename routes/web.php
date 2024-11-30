<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;


Route::get('/', function () {
    return view('welcome');
});

//Tâches

Route::get('/tache/list', [TaskController::class, 'indexTache'])->name('tache.list');

Route::get('/tache/add', [TaskController::class, 'create'])->name('tache.create');
Route::post('/tache/store', [TaskController::class, 'store'])->name('tache.store');

Route::get('/tache/edit/{id}', [TaskController::class, 'edit'])->name('tache.edit');
Route::post('/tache/update/{id}', [TaskController::class, 'update'])->name('tache.update');

Route::delete('/tache/delete/{id}', [TaskController::class, 'destroy'])->name('tache.destroy');

//Projets

Route::get('/projet/list', [ProjectController::class, 'indexProjet'])->name('projet.list');

Route::get('/projet/add', [ProjectController::class, 'create'])->name('projet.create');
Route::post('/projet/store', [ProjectController::class, 'store'])->name('projet.store');

Route::get('/projet/edit/{id}', [ProjectController::class, 'edit'])->name('projet.edit');
Route::post('/projet/update/{id}', [ProjectController::class, 'update'])->name('projet.update');

Route::delete('/projet/delete/{id}', [ProjectController::class, 'destroy'])->name('projet.destroy');

