<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarAPIController extends Controller
{

    public function index()
    {
        return Car::all();
    }

    public function create()
    {
        //
    }

    public function store()
    {
        $car = new Car();
        $car->owner_id = request('owner_id');
        $car->reg_number = request('reg_number');
        $car->brand = request('brand');
        $car->model = request('model');
        $car->save();

        return $car;
    }

    public function show($id)
    {
        return Car::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Car $car)
    {
        $attributes = [
            'owner_id' => request('owner_id') ?? $car->owner_id,
            'reg_number' => request('reg_number') ?? $car->reg_number,
            'brand' => request('brand') ?? $car->brand,
            'model' => request('model') ?? $car->brand,
        ];

        $car->update($attributes);

        return $car;
    }

    public function destroy($id)
    {
        Car::destroy($id);
        return true;
    }
}
