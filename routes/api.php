<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Inscription
Route::post('/register', [UserController::class, 'store'])->name('register.store');

// Connexion
Route::post('/login', [UserController::class, 'login'])->name('login');

// Affichage du profil de l'utilisateur connecté
Route::middleware('auth:sanctum')->get('/profil/{id}', [UserController::class, 'profil'])->name('profil.index');

// Modification du profil
Route::middleware('auth:sanctum')->put('/profil/{id}', [UserController::class, 'update'])->name('profil.update');
