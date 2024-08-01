<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', [AuthController::class, 'Login']) ;
Route::post('/register', [AuthController::class, 'Register']) ;
Route::post('/forgetpassword', [ForgetController::class, 'ForgetPassword']) ;
Route::post('/resetpassword', [ResetController::class, 'ResetPassword']) ;
Route::get('/user', [UserController::class, 'user'])->middleware('auth:api') ;

Route::get('/products', [ProductController::class, 'index']) ;
Route::post('/products/store', [ProductController::class, 'store']) ;
