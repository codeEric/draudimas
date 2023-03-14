<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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

Route::middleware('auth')->group(function () {
  Route::resource('dashboard/cars', CarController::class)->except('show')->middleware('role');
  Route::get('dashboard/cars', [CarController::class, 'index']);
  Route::post('/dashboard/cars/search', [CarController::class, 'search']);
  Route::post('logout', [SessionsController::class, 'destroy']);
});

Route::middleware('guest')->group(function () {
  Route::get('register', [RegisterController::class, 'create']);
  Route::post('register', [RegisterController::class, 'store']);
  Route::get('login', [SessionsController::class, 'create'])->name('login');
  Route::post('login', [SessionsController::class, 'store']);
});

Route::post('/dashboard/owners/search', [OwnerController::class, 'search']);

Route::resource('dashboard/owners', OwnerController::class)->except('show');
Route::get('dashboard/owners', [OwnerController::class, 'index']);
