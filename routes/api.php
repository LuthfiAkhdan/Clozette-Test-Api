<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/categories/data', [CategoryController::class, 'index'])->middleware('auth:sanctum');
Route::post('/categories', [CategoryController::class, 'store'])->middleware('auth:sanctum');

Route::get('/products/data', [ProductController::class, 'index'])->middleware('auth:sanctum');
Route::post('/products', [ProductController::class, 'store'])->middleware('auth:sanctum');
Route::get('/search', [ProductController::class, 'search'])->middleware('auth:sanctum');
