<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Rotas públicas (login e registro)
Route::get('/', function () {
    return view('welcome');
});

// Rotas protegidas (autenticação necessária)
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
});

// Rotas de autenticação do Breeze
require __DIR__.'/auth.php';


