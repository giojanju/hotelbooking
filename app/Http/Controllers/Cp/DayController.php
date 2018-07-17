<?php

namespace App\Http\Controllers\Cp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Tour;

class DayController extends Controller
{
    public function index()
    {
    	$days = Day::with('tour')->latest()->paginate(15);
    	
    	return view('cp.days.index', compact('days'));
    }

    public function remove($id)
    {
        $day = Day::findOrFail($id);
        $day->delete();

        return redirect(route('cp.days.index'))->withSuccess('Day deleted successfuly!');
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
        ]);

        $day = Day::create($data);

        if ($day) {
            return redirect(route('cp.days.create'))->withSuccess('New day created successfuly!');
        }
    }

    public function create()
    {
        $tours = Tour::latest()->get();

        return view('cp.days.create', compact('tours'));
    }

    public function edit(Day $day)
    {
        $tours = Tour::latest()->get();

        return view('cp.days.modify', compact('tours', 'day'));
    }

    public function update(Day $day, Request $request)
    {
        $data = $request->except('token');

        $locales = config('app.locales');

        foreach ($locales as $local => $lang) {
            $data[$local]['slug'] = str_slug($data[$local]['title'], '-');
        }

        $request->validate([
            'en.title' => 'required',
        ]);

        $day->update($data);

        return redirect(route('cp.days.index'))->withSuccess('Day updated successfuly!');
    }
}
