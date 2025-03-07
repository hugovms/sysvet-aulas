<?php

use App\Http\Controllers\AnimaisController;
use App\Http\Controllers\ExamesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsultasController;
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
Route::group(['prefix' => 'usuarios'], function(){
    //create
    Route::post('/criar', [UserController::class, 'create']);
    //read - all
    Route::get('/', [UserController::class, 'index']);
    //Read Individual
    Route::get('/{id}', [UserController::class, 'show']);
    //update
    Route::post('/atualizar/{id}', [UserController::class, 'update']);
    //delete
    Route::delete('/{id}', [UserController::class, 'delete']);
});

//Rotas de Animais
Route::group(['prefix' => 'animais'], function(){
    //create
    Route::post('/criar', [AnimaisController::class, 'create']);
    //read - all
    Route::get('/', [AnimaisController::class, 'index']);
    //Read Individual
    Route::get('/{id}', [AnimaisController::class, 'show']);
    //update
    Route::post('/atualizar/{id}', [AnimaisController::class, 'update']);
    //delete
    Route::delete('/{id}', [AnimaisController::class, 'delete']);
});

// /api/consultas/criar
Route::group(['prefix' => 'consultas'], function(){
    Route::get('/',  [ConsultasController::class, 'index']);
    Route::post('/criar', [ConsultasController::class, 'create']);
    Route::post('/atualizar/{id}', [ConsultasController::class, 'update']);
    Route::get('/{id}', [ConsultasController::class, 'show']);
    Route::delete('/{id}', [ConsultasController::class, 'delete']);
});

