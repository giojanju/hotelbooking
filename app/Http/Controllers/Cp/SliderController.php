<?php

namespace App\Http\Controllers\Cp;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
    	$sliders = Slider::all();

    	return view('cp.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
    	$data = $request->except('_token');

    	$slider = Slider::create($data);

    	if ($request->has('image')) {
            $slider->addMedia($request->image)->toMediaCollection();
        }

    	return redirect(route('cp.sliders.index'))->withSuccess('New slider successfuly!');
    }

    public function remove($id)
    {
    	$slider = Slider::findOrFail($id);
    	$slider->delete();

    	return redirect(route('cp.sliders.index'))->withSuccess('slider deleted successfuly!');
    }
}
