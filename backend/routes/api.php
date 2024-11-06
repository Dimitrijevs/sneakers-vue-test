<?php

use App\Http\Controllers\api\SneakerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sneakers', [SneakerController::class, 'index']);


Route::get('/favorites', [SneakerController::class, 'favorites']);

Route::post('/favorites/{id}', [SneakerController::class, 'addToFavorites']);


Route::get('/cart', [SneakerController::class, 'cart']);

Route::post('/cart/{id}', [SneakerController::class, 'addToCart']);

Route::post('/purchase', [SneakerController::class, 'purchase']);
