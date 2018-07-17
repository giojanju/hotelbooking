<?php

namespace App\Http\Controllers\Cp\Modules;

use App\Http\Controllers\Controller;
use App\Models\CarCategory;
use Illuminate\Http\Request;

class CarCategoryController extends Controller
{
    public function index()
    {
    	$categories = CarCategory::with('cars')->latest()->get();

    	return view('cp.modules.car_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('cp.modules.car_categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('token');

        $request->validate([
            'en.title' => 'required',
        ]);

        $category = CarCategory::create($data);

        if ($category) {
            return redirect(route('cp.modules.car_categories.create'))->withSuccess('New car category created successfuly!');
        }
    }

    public function remove($id)
    {
        $category = CarCategory::findOrFail($id);
        $category->delete();

        return redirect(route('cp.modules.car_categories.index'))->withSuccess('Car category deleted successfuly!');
    }

    public function edit(CarCategory $carcategory)
    {
        return view('cp.modules.car_categories.modify', compact('carcategory'));
    }

    public function update(CarCategory $carcategory, Request $request)
    {
        $data = $request->except('token');

        $request->validate([
            'en.title' => 'required',
        ]);

        $carcategory->update($data);

        return redirect(route('cp.modules.car_categories.index'))->withSuccess('Car category updated successfuly!');
    }
}
