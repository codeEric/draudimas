<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Car::class, 'car');
    }

    public function index()
    {

        $filter = request()->session()->get('filterCars', (object)['brand' => null, 'model' => null, 'reg_number' => null]);

        $cars = Car::with('owner')->filter($filter)->get();

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
            'images.*' => [
                File::image()
            ]
        ]);

        unset($attributes['images']);

        $car = Car::create($attributes);

        if (request()->file("images") != null) {
            foreach (request()->file('images') as $image) {
                $image->store("/public/cars");
                $filename = $image->hashName();
                CarImage::create([
                    'image' => $filename,
                    'car_id' => $car->id
                ]);
            }
        }

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
            'owner_id' => 'required',
            'images.*' => [
                File::image()
            ]
        ]);

        unset($attributes['images']);

        if (request()->file("images") != null) {
            foreach (request()->file('images') as $image) {
                $image->store("/public/cars");
                $filename = $image->hashName();
                CarImage::create([
                    'image' => $filename,
                    'car_id' => $car->id
                ]);
            }
        }

        $car->update($attributes);

        return redirect('/dashboard/cars')->with('success', "Car has been updated");
    }

    public function destroy(Car $car)
    {
        foreach ($car->carImage as $image) {
            unlink(storage_path('app/public/cars/' . $image->image));
        }
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
