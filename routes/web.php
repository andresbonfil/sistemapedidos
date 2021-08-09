<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () { return view('bonfil'); });
Route::get('email', [UsuarioController::class, 'emailtest'])->name('emailtest');
Route::get('emailRecovery', function () { return view('emailRecovery'); });
Route::post('emailRecovery', [UsuarioController::class, 'emailRecoveryPost'])->name('emailRecoveryPost');
