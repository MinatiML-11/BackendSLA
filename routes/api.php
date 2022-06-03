<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;

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
});
