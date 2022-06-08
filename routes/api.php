<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClothesController;
use App\Http\Controllers\Api\LaundryController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\PriceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ServiceListController;
use App\Http\Controllers\Api\StatusOrderController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// auth route list
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group([
  'middleware' => 'auth:api'
], function () {
  Route::get('/profile', [UserController::class, 'user']);
  Route::post('/logout', [AuthController::class, 'logout']);

  // Route Role
  Route::resource('role', RoleController::class);

  // Route Laundry
  Route::resource('laundry', LaundryController::class);

  // Route Order 
  Route::resource('order', OrdersController::class);

  // Route Service List
  Route::resource('service-list', ServiceListController::class);

  // Route Service
  Route::resource('service', ServiceController::class);

  // Route Price
  Route::resource('price', PriceController::class);

  // Route Clothes
  Route::resource('clothes', ClothesController::class);

  // Route status order 
  Route::resource('status-order', StatusOrderController::class);
});
