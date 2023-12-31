<?php

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

// ****** LOGIN ********
Route::post('login',[App\Http\Controllers\Api\LoginController::class, 'login']);
Route::post('reniec',[App\Http\Controllers\Api\ReniecController::class, 'consultar']);
Route::apiResource('register',\App\Http\Controllers\Api\RegisterController::class)->only('store','show','update','destroy');
//
Route::apiResource('v1/users',\App\Http\Controllers\Api\V1\UserController::class);
Route::apiResource('v1/gimnasios',\App\Http\Controllers\Api\V1\GimnasiosController::class)->only('show','store','update','destroy');

Route::apiResource('v1/pagos', \App\Http\Controllers\Api\V1\PagosController::class);
Route::apiResource('v1/gimnasios', \App\Http\Controllers\Api\V1\GimnasiosController::class);
Route::apiResource('v1/usuarios', \App\Http\Controllers\Api\V1\UsuariosController::class);



Route::apiResource('v1/planes', \App\Http\Controllers\Api\V1\PlanesController::class)->except(['update']);
Route::put('v1/planes/{plan}', [\App\Http\Controllers\Api\V1\PlanesController::class, 'update'])->name('planes.update');
Route::delete('v1/planes/{plan}', [\App\Http\Controllers\Api\V1\PlanesController::class, 'destroy'])->name('planes.destroy');


Route::apiResource('v1/pagos', \App\Http\Controllers\Api\V1\PagosController::class)->except(['update']);
Route::put('v1/pagos/{pago}', [\App\Http\Controllers\Api\V1\PagosController::class, 'update'])->name('pagos.update');
Route::delete('v1/pagos/{pago}', [\App\Http\Controllers\Api\V1\PagosController::class, 'destroy'])->name('pagos.destroy');


Route::apiResource('v1/usuarios', \App\Http\Controllers\Api\V1\UsuariosController::class)->except(['update']);
Route::put('v1/usuarios/{usuario}', [\App\Http\Controllers\Api\V1\UsuariosController::class, 'update'])->name('usuarios.update');
Route::delete('v1/usuarios/{usuario}', [\App\Http\Controllers\Api\V1\UsuariosController::class, 'destroy'])->name('usuarios.destroy');


Route::middleware('auth:sanctum')->group(function () {
    // Rutas que requieren autenticación
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // ...
});


