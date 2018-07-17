<?php

namespace App\Http\Controllers\Cp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
    	$hotels = Hotel::latest()->get();

    	return view('cp.hotels.index', compact('hotels'));
    }

    public function create()
    {
    	return view('cp.hotels.add');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        // return $data;
        $locales = config('app.locales');

        foreach ($locales as $local => $lang) {
            $data[$local]['slug'] = str_slug($data[$local]['title'], '-');
        }

        $request->validate([
            'en.title' => 'required',
            'en.text' => 'required',
        ]);

        $hotel = Hotel::create($data);

        if ($request->has('image')) {
        	// if coupe as image
        	if (is_array($request->image)) {
        		foreach($request->file('image') as $image) {
				   $hotel->addMedia($image)->toMediaCollection('medical-reports');
				}
        	} else {
            	$hotel->addMedia($request->image)->toMediaCollection('cover');
        	}
        }

        if ($hotel) {
            return redirect(route('cp.hotels.create'))->withSuccess('New hotel created successfuly!');
        }
    }

    public function remove($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect(route('cp.hotels.index'))->withSuccess('hotel deleted successfuly!');
    }
}
