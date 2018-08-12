<?php

namespace App\Http\Controllers\Cp;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelService;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
    	$hotels = Hotel::latest()->get();

    	return view('cp.hotels.index', compact('hotels'));
    }

    public function create()
    {
        $hotel_services = HotelService::all();

    	return view('cp.hotels.add', compact('hotel_services'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $data['ge']['slug'] = str_slug($data['ge']['title'], '-');

        $request->validate([
            'ge.title' => 'required',
            // 'ge.description' => 'required',
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

        if (!empty($data['hotel_services'])) {
            $hotel->hotel_services()->sync($data['hotel_services']);
        }

        if ($hotel) {
            return redirect(route('cp.hotels.create'))->withSuccess('New hotel created successfuly!');
        }
    }

    public function update(Hotel $hotel, Request $request)
    {
        $data = $request->except('_token');

        $data['ge']['slug'] = str_slug($data['ge']['title'], '-');

        $request->validate([
            'ge.title' => 'required',
            // 'ge.description' => 'required',
        ]);

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

        if (!empty($data['hotel_services'])) {
            $hotel->hotel_services()->sync($data['hotel_services']);
        }

        $hotel->update($data);

        if ($hotel) {
            return redirect(route('cp.hotels.create'))->withSuccess('hotel updated successfuly!');
        }
    }

    public function edit(Hotel $hotel)
    {
        $hotel_services = HotelService::all();
        return view('cp.hotels.modify', compact('hotel', 'hotel_services'));
    }

    public function remove($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect(route('cp.hotels.index'))->withSuccess('hotel deleted successfuly!');
    }
}
