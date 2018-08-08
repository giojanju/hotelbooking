<?php

namespace App\Http\Controllers\Cp;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
    	$services = Service::all();

    	return view('cp.services.index', compact('services'));
    }

    public function create()
    {
        return view('cp.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('token');

        $request->validate([
            'ge.title' => 'required',
        ]);

        $service = Service::create($data);

        if ($service) {
            return redirect(route('cp.services.create'))->withSuccess('New service created successfuly!');
        }
    }

    public function remove($id)
    {
        $menu = Service::findOrFail($id);
        $menu->delete();

        return redirect(route('cp.services.index'))->withSuccess('Service deleted successfuly!');
    }

    public function edit(Service $service)
    {
        return view('cp.services.modify', compact('service'));
    }

    public function update(Service $service, Request $request)
    {
        $data = $request->except('token');

        $request->validate([
            'ge.name' => 'required',
        ]);

        $service->update($data);

        return redirect(route('cp.services.index'))->withSuccess('Service updated successfuly!');
    }
}
