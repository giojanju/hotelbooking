<?php

namespace App\Http\Controllers\Cp;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Menu::with('parent')->latest()->get();

    	return view('cp.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Menu::with('parent')->latest()->get();

        return view('cp.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->except('token');

        $locales = config('app.locales');

        foreach ($locales as $local => $lang) {
            $data[$local]['slug'] = str_slug($data[$local]['name'], '-');
        }

        $request->validate([
            'en.name' => 'required',
        ]);

        $menu = Menu::create($data);

        if ($menu) {
            return redirect(route('cp.categories.create'))->withSuccess('New category created successfuly!');
        }
    }

    public function remove($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect(route('cp.categories.index'))->withSuccess('Category deleted successfuly!');
    }

    public function edit(Menu $menu)
    {
        $categories = Menu::with('parent')->latest()->get();

        return view('cp.categories.modify', compact('menu', 'categories'));
    }

    public function update(Menu $menu, Request $request)
    {
        $data = $request->except('token');

        $locales = config('app.locales');

        foreach ($locales as $local => $lang) {
            $data[$local]['slug'] = str_slug($data[$local]['name'], '-');
        }

        $request->validate([
            'en.name' => 'required',
        ]);

        $menu->update($data);

        return redirect(route('cp.categories.index'))->withSuccess('Category updated successfuly!');
    }
}
