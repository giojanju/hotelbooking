<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function getAbout()
    {
    	$hotels = Hotel::latest()->get();

    	return view('hotel', compact('hotels'));
    }
}
