<?php

use App\Models\Car;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard/cars/create', function () {
    return view('dashboard.cars.create');
});

Route::get('/dashboard/cars', function () {
    return view('dashboard.cars.index', [
        'cars' => Car::all()
    ]);
});

Route::get('/dashboard/owners', function () {
    return view('home');
});
