<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrameworkController;
use App\Http\Controllers\HobbyController;

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

Route::get('profile', [UserController::class,'index']);

Route::post('profile/frameworks',[FrameworkController::class,'store']);
Route::post('profile/hobbies',[HobbyController::class,'store']);

Route::put('profile',[UserController::class,'update']);
Route::put('profile/frameworks/{framework}',[FrameworkController::class,'update']);
Route::put('profile/hobbies/{hobby}',[HobbyController::class,'update']);

Route::delete('profile/frameworks/{framework}',[FrameworkController::class,'destroy']);
Route::delete('profile/hobbies/{hobby}',[HobbyController::class,'destroy']);