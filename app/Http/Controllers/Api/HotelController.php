<?php

namespace App\Http\Controllers\Api;

use App\CRUD\CrudAbstract;
use App\Models\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelController extends CrudAbstract
{
    protected $config = [
        'model' => [
            'name' => Hotel::class,
            'relations' => ['services', 'media'],
            'rules' => [
                'price' => 'required',
            ],
        ],
        'media' => [
            'collection'  => 'cover',
            'field' => 'image',
        ],
    ];
}
