<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthenticationController;

// GET POST => Method HTTP
// Slug
// http://127.0.0.1:8000/ => Base url

// Route::get('/test', function () {
//     echo '123';
// });

// Route::get('/test');

// Route::get('/list-user', [UserController::class, 'showUser']);

// // Slug
// Route::get('/get-user/{id}/{name?}', [UserController::class, 'getUser']);

// // Params
// Route::get('/update-user', [UserController::class, 'updateUser']);

// Route::get('/thongtinsv', [UserController::class, 'thongtinsv']);


// // UserController
// Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

//     Route::get('list-users', [UserController::class, 'listUsers'])->name('listUsers');

//     Route::get('add-users', [UserController::class, 'addUsers'])->name('addUsers');

//     Route::post('add-users', [UserController::class, 'postUsers'])->name('postUsers');

//     Route::get('users/list-users/{idUsers}', [UserController::class, 'editUsers'])->name('editUsers');

//     Route::post('users/list-users/{idUsers}', [UserController::class, 'updateUsers'])->name('updateUsers');

//     Route::get('list-users/{idUsers}', [UserController::class, 'deleteUsers'])->name('deleteUsers');

// });

// // ProductController
// Route::group(['prefix' => 'product', 'as' => 'product.'], function () {

//     Route::get('list-product', [ProductController::class, 'listProduct'])->name('listProduct');

//     Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');

//     Route::post('add-product', [ProductController::class, 'postProduct'])->name('postProduct');

//     Route::get('product/list-product/{idProduct}', [ProductController::class, 'editProduct'])->name('editProduct');

//     Route::post('product/list-product/{idProduct}', [ProductController::class, 'updateProduct'])->name('updateProduct');

//     Route::get('search-product', [ProductController::class, 'searchProduct'])->name('searchProduct');

//     Route::get('list-product/{idProduct}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

// });

// Route::get('test', [ProductController::class, 'test']);

Route::get('login', [AuthenticationController::class, 'login'])->name('login');

Route::post('login', [AuthenticationController::class, 'postLogin'])->name('postLogin');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {

        Route::get('/', [ProductController::class, 'listProducts'])->name('listProducts');

        Route::get('add-product', [ProductController::class, 'addProducts'])->name('addProducts');

        Route::post('add-product', [ProductController::class, 'addPostProducts'])->name('addPostProducts');

        Route::delete('delete-product', [ProductController::class, 'deleteProducts'])->name('deleteProducts');

        Route::get('detail-product/{idProduct}', [ProductController::class, 'detailProducts'])->name('detailProducts');

        Route::get('edit-product/{idProduct}', [ProductController::class, 'editProducts'])->name('editProducts');

        Route::patch('edit-product/{idProduct}', [ProductController::class, 'editPatchProducts'])->name('editPatchProducts');

    });
});

