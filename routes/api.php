<?php

use App\Http\Controllers\ExamesController;
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

//Rotas de Exames
//create
Route::post('/exames/criar', [ExamesController::class, 'create']);
//read - all
Route::get('/exames', [ExamesController::class, 'index']);
//Read Individual
Route::get('/exames/{id}', [ExamesController::class, 'show']);
//update
Route::post('/exames/atualizar/{id}', [ExamesController::class, 'update']);

//delete
Route::delete('/exames/{id}', [ExamesController::class, 'delete']);

//Rotas de Usuários
//create
Route::post('/usuarios/criar', [UserController::class, 'create']);
//read - all
Route::get('/usuarios', [UserController::class, 'index']);
//Read Individual
Route::get('/usuarios/{id}', [UserController::class, 'show']);
//update
Route::post('/usuarios/atualizar/{id}', [UserController::class, 'update']);
//delete
Route::delete('/usuarios/{id}', [UserController::class, 'delete']);
