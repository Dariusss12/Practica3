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

Route::get('portfolio', [UserController::class,'index']);

Route::post('portfolio/frameworks',[FrameworkController::class,'store']);
Route::post('portfolio/hobbies',[HobbyController::class,'store']);

Route::put('portfolio',[UserController::class,'update']);
Route::put('portfolio/frameworks/{framework}',[FrameworkController::class,'update']);
Route::put('portfolio/hobbies/{hobby}',[HobbyController::class,'update']);

Route::delete('portfolio/frameworks/{framework}',[FrameworkController::class,'destroy']);
Route::delete('portfolio/hobbies/{hobby}',[HobbyController::class,'destroy']);