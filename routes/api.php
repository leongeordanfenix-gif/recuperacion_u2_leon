<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\LibroController;

Route::apiResource('autores', AutorController::class);
Route::apiResource('libros', LibroController::class);
Route::get('autores/{id}/libros', [AutorController::class, 'libros']);
