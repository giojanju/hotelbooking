<?php

namespace App\Http\Controllers\Cp;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SettingTranslation;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
    	$settings = Setting::all();

    	return view('cp.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            return $request->photo;
        }

    	Setting::all()->each(function ($item) {
            $item->delete();
        });

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $insertedData = [
                    'key' => $key,
                ];

                foreach (config('app.locales') as $local => $locale) {
                    $insertedData[$local] = [
                        'locale_value' => $value['locale'][$local],
                    ];
                }

                Setting::create($insertedData);
            } else {
                $insertedData = [
                    'key' => $key,
                    'value' => $value,
                ];

                Setting::create($insertedData);
            }

    	}

    	return redirect()->route('cp.settings.index');
    }
}
