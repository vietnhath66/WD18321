<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// GET POST => Method HTTP
// Slug
// http://127.0.0.1:8000/ => Base url

Route::get('/test', function () {
    echo '123';
});

Route::get('/test');

Route::get('/list-user', [UserController::class, 'showUser']);

// Slug
Route::get('/get-user/{id}/{name?}', [UserController::class, 'getUser']);

// Params
Route::get('/update-user', [UserController::class, 'updateUser']);

Route::get('/thongtinsv', [UserController::class, 'thongtinsv']);


