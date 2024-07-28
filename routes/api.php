<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/users/add', [UserController::class, 'store']);
Route::get('/users/get', [UserController::class, 'index']);
Route::post('/users/update/{id}', [UserController::class, 'update']);
Route::delete('/users/destroy/{id}', [UserController::class, 'destroy']);
