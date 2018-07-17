<?php

namespace App\Http\Controllers\Cp\Modules;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarCategory;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
    	$cars = Car::with('carCategory')->latest()->get();

    	return view('cp.modules.cars.index', compact('cars'));
    }

    public function create()
    {
    	$categories = CarCategory::all();

        return view('cp.modules.cars.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->except('token');

        $request->validate([
            'en.title' => 'required',
        ]);

        $car = Car::create($data);

        if ($request->has('image')) {
        	$car->addMedia($data['image'])->toMediaCollection('car');
        }

        if ($car) {
            return redirect(route('cp.modules.cars.create'))->withSuccess('New car created successfuly!');
        }
    }

    public function remove($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect(route('cp.modules.car_categories.index'))->withSuccess('Car car deleted successfuly!');
    }

    public function edit(Car $car)
    {
    	$categories = CarCategory::all();

        return view('cp.modules.cars.modify', compact('car', 'categories'));
    }

    public function update(Car $car, Request $request)
    {
        $data = $request->except('token');

        $request->validate([
            'en.title' => 'required',
        ]);

        if ($request->has('image')) {
            $tour->clearMediaCollection('car')->addMedia($data['image'])->toMediaCollection('car');
        }

        $car->update($data);

        return redirect(route('cp.modules.cars.index'))->withSuccess('Car updated successfuly!');
    }
}
