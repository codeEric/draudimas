<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return view('dashboard.cars.index', [
            'cars' => Car::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.cars.create');
    }
}
