<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Hotel;
use App\Models\Menu;
use App\Models\Tour;
use Debugbar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getIndex()
    {
    	return view('index');
    }
}
