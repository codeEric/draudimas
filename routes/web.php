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

Route::post('/dashboard/cars/search', [CarController::class, 'search']);
Route::post('/dashboard/owners/search', [OwnerController::class, 'search']);


Route::resource('dashboard/cars', CarController::class)->except('show');
Route::resource('dashboard/owners', OwnerController::class)->except('show');
