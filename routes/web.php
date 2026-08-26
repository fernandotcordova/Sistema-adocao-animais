<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

Route::get('/', [AnimalController::class, 'index']) -> name('index') -> middleware('auth');

//rotas de criação
Route::get('/create', [AnimalController::class, 'create']) -> name('animals.create') -> middleware('auth');

Route::post('/create',[ AnimalController::class, 'store']);

//para apagar
Route::delete('/animal/{id}', [AnimalController::class, 'destroy'])-> name('animals.delete') -> middleware('auth');

//para editar
Route::get('/animals/edit/{id}', [AnimalController::class, 'edit']) -> name('animals.edit')-> middleware('auth');

//para atualizar
Route::put('/animals/update/{id}',[AnimalController::class, 'update']) -> name('animals.update') -> middleware('auth');

//rotas para mostrar telas
Route::get('/animals/{id}', [AnimalController::class, 'show']) -> name('knowMore') ->middleware('auth');

//para o adotar
Route::get('/animals/adopt/{id}', [AnimalController::class, 'adoptShow']) -> name('animals.adopt')-> middleware('auth');

Route::post('/animals/adopt/', [AnimalController::class, 'adopt']) -> name('animals.adopt.submit') -> middleware('auth');


Route::get('/dashboard', [AnimalController::class, 'dashboard']) -> name('dashboard') -> middleware('auth');

