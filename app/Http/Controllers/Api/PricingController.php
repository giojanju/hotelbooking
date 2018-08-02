<?php

namespace App\Http\Controllers\Api;

use App\CRUD\CrudAbstract;
use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends CrudAbstract
{
    protected $config = [
        'model' => [
            'name' => Pricing::class,
            'rules' => [
                'price' => 'required',
                'ge.title' => 'required',
            ],
        ],
    ];
}
