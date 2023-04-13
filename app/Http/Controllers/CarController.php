<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Validation\Rules\File;

class CarController extends Controller
{
    public function index()
    {

        $filter = request()->session()->get('filterCars', (object)['brand' => null, 'model' => null, 'reg_number' => null]);

        $cars = Car::with('owner')->filter($filter)->paginate(15);

        return view('dashboard.cars.index', [
            'allCars' => Car::with('owner')->get(),
            'cars' => $cars,
            'filter' => $filter
        ]);
    }

    public function create()
    {
        return view('dashboard.cars.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'brand' => 'required|min:2|max:255',
            'model' => 'required|min:2|max:255',
            'reg_number' => ['required', 'regex:/^[A-Z]{3}\d{3}$/'],
            'owner_id' => 'required',
            'image' => [
                'required', File::image()
            ]
        ]);
        // dd($attributes);

        request()->file("image")->store("/public/cars");
        $attributes['image'] = request()->file("image")->hashName();

        Car::create($attributes);

        return redirect('/dashboard/cars')->with('success', "New car has been added!");
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
            'brand' => 'required|min:2|max:255',
            'model' => 'required|min:2|max:255',
            'reg_number' => ['required', 'regex:/^[A-Z]{3}\d{3}$/'],
            'owner_id' => 'required'
        ]);

        $car->update($attributes);

        return redirect('/dashboard/cars')->with('success', "Car has been updated");
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return back()->with('success', 'Car has been deleted');
    }

    public function search()
    {
        $filterCars = new \stdClass();
        $filterCars->brand = request('search-brand');
        $filterCars->model = request('search-model');
        $filterCars->reg_number = request('search-reg_number');
        request()->session()->put('filterCars', $filterCars);
        return redirect('/dashboard/cars');
    }
}
