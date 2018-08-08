<?php

namespace App\Http\Controllers\Api;

use App\CRUD\CrudAbstract;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends CrudAbstract
{
    protected $config = [
        'model' => [
            'name' => Slider::class,
        ],
    ];
}
