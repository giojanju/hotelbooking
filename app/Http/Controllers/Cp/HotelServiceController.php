<?php

namespace App\Http\Controllers\Cp;

use App\Http\Controllers\Controller;
use App\Models\HotelService;
use Illuminate\Http\Request;

class HotelServiceController extends Controller
{
    public function index()
    {
    	$hotel_services = HotelService::latest()->get();

    	return view('cp.hotel_services.index', compact('hotel_services'));
    }

    public function create()
    {
    	return view('cp.hotel_services.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        // return $data;
        $request->validate([
            'ge.title' => 'required',
        ]);

        $hotel_services = HotelService::create($data);

        if ($hotel_services) {
            return redirect(route('cp.hotel_services.create'))->withSuccess('New hotel service created successfuly!');
        }
    }

    public function edit(HotelService $hotel_service)
    {
        return view('cp.hotel_services.modify', compact('hotel_service'));
    }

    public function update(HotelService $hotel_service, Request $request)
    {
        $data = $request->except('token');

        $request->validate([
            'ge.title' => 'required',
        ]);

        $hotel_service->update($data);

        return redirect(route('cp.hotel_services.index'))->withSuccess('Service updated successfuly!');
    }

    public function remove($id)
    {
        $hotel_service = HotelService::findOrFail($id);
        $hotel_service->delete();

        return redirect(route('cp.hotel_services.index'))->withSuccess('hotel service deleted successfuly!');
    }
}
