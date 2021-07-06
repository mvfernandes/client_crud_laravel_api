<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/cliente', [ClienteController::class, 'store']);
Route::get('/cliente/{id}', [ClienteController::class, 'show']);
Route::put('/cliente/{id}', [ClienteController::class, 'update']);
Route::delete('/cliente/{id}', [ClienteController::class, 'destroy']);
Route::post('/endereco/{id}', [ClienteController::class, 'storeAddress']);
Route::put('/endereco/{idUser}/{idAddress}', [ClienteController::class, 'updateAddress']);
Route::delete('/endereco/{idUser}/{idAddress}', [ClienteController::class, 'destroyAddress']);
