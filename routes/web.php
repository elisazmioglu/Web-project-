<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Route to display the products and the form
Route::get('/products', [ProductController::class, 'index']);

// New Route to handle saving the product from the form
Route::post('/products', [ProductController::class, 'store']);
