<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        return view('dashboard.cars.index', [
            'cars' => Car::with('owner')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.cars.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'brand' => 'required',
            'model' => 'required',
            'reg_number' => 'required',
            'owner_id' => 'required'
        ]);

        Car::create($attributes);

        return redirect('/dashboard/cars');
    }

    public function edit(Car $car)
    {
        return view('dashboard.cars.edit', [
            'car' => $car
        ]);
    }

    public function update(Car $car)
    {

        $attributes = request()->validate([
            'brand' => 'required',
            'model' => 'required',
            'reg_number' => 'required',
            'owner_id' => 'required'
        ]);

        $car->update($attributes);

        return redirect('/dashboard/cars');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return back();
    }
}
