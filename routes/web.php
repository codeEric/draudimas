<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard/cars', [CarController::class, 'index']);
Route::get('/dashboard/cars/create', [CarController::class, 'create']);
Route::post('/dashboard/cars', [CarController::class, 'store']);

Route::get('/dashboard/owners', [OwnerController::class, 'index']);
