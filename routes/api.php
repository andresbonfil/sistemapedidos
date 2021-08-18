<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::middleware('auth:api')->get('/user', function (Request $request) { return $request->user(); });
Route::apiResource("usuario", UsuarioController::class)->name('usuario');
Route::post('usuario/recontra', [UsuarioController::class, 'recontra'])->name('usuario.recontra');
Route::post('usuario/login', [UsuarioController::class, 'login'])->name('usuario.login');

//Route::get('usuairo/{id}', [UsuarioController::class,'show'])->name('usuario.show');
//Route::put('usuario/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
//Route::delete('usuairo/{id}', [UsuarioController::class, 'destroy'])->name('usuario.delete');
