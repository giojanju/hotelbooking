<?php

namespace App\Http\Controllers;

use App\Models\CarCategory;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Tour;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    	$_locales = config('app.locales');

    	view()->share(compact('_locales'));
    }
}
