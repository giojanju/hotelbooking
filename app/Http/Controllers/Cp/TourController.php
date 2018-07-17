<?php

namespace App\Http\Controllers\Cp;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
    	$tours = Tour::latest()->get();

    	return view('cp.tours.index', compact('tours'));
    }

    public function create()
    {
        $categories = Menu::with('parent')->latest()->get();

        return view('cp.tours.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->except('token');

        $locales = config('app.locales');

        foreach ($locales as $local => $lang) {
            $data[$local]['slug'] = str_slug($data[$local]['title'], '-');
        }

        $request->validate([
            'en.title' => 'required',
            'en.sub_title' => 'required',
            'en.price' => 'required',
            'en.description' => 'required',
        ]);

        $tour = Tour::create($data);

        if ($request->has('image')) {
            $tour->addMedia($request->image)->toMediaCollection('cover');
        }

        if ($tour) {
            return redirect(route('cp.tours.create'))->withSuccess('New tour created successfuly!');
        }
    }

    public function remove($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete();

        return redirect(route('cp.tours.index'))->withSuccess('Tour deleted successfuly!');
    }

    public function edit(Tour $tour)
    {
        $categories = Menu::latest()->get();

        return view('cp.tours.modify', compact('tour', 'categories'));
    }

    public function update(Tour $tour, Request $request)
    {
        $data = $request->except('token');

        $locales = config('app.locales');

        foreach ($locales as $local => $lang) {
            $data[$local]['slug'] = str_slug($data[$local]['title'], '-');
        }

        $request->validate([
            'en.title' => 'required',
            'en.sub_title' => 'required',
            'en.price' => 'required',
            'en.description' => 'required',
        ]);

        if ($request->has('image')) {
            $tour->clearMediaCollection('cover')->addMedia($request->image)->toMediaCollection('cover');
        }
        
        $tour->update($data);

        return redirect(route('cp.tours.index'))->withSuccess('Tour updated successfuly!');
    }
}
